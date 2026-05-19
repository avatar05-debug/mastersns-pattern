# Hướng dẫn Thiết lập và Đồng bộ MasterSNS (Revised)

## 🛑 CẢNH BÁO NGUY HIỂM (DANGER WARNING)
Lệnh đồng bộ (`make git-push` và `make git-pull`) sử dụng `rsync --delete`. 
**Điều này có nghĩa là bất kỳ file nào có ở thư mục đích nhưng không có ở thư mục nguồn sẽ bị XÓA VĨNH VIỄN.**
- Luôn chạy `make git-push-dry` hoặc `make git-pull-dry` trước khi thực hiện đồng bộ thật.
- Kiểm tra kỹ danh sách file sẽ bị xóa trong output của lệnh dry-run.

## 1. Nguyên tắc "Source of Truth" (Nguồn Sự Thật)
Để tránh xung đột dữ liệu và mất mã nguồn:
- **Lập trình DUY NHẤT tại thư mục Driver** (`Avatar-driver/mastersns-driver/ange_mastersns`).
- Thư mục `Project-repo` chỉ đóng vai trò là "vùng đệm" để commit lên Git hệ thống.
- Tuyệt đối KHÔNG sửa code trực tiếp trong `Project-repo`.

## 2. Quy trình Cài đặt Mới
Trước khi bắt đầu, bạn phải đảm bảo code ứng dụng đã được tải về thông qua submodule:

```bash
# 1. Khởi tạo submodule (BẮT BUỘC)
git submodule update --init --recursive

# 2. Khởi tạo môi trường Docker và cấu hình
make init

# 3. Nạp dữ liệu mẫu
make import
```

## 3. Quy trình Đồng bộ An toàn
Mỗi khi muốn đẩy code lên repository chính:

1. **Kiểm tra (Dry-run):**
   ```bash
   make git-push-dry
   ```
2. **Xác nhận:** Kiểm tra danh sách file bị xóa/thay đổi. Nếu ổn, tiến hành đẩy thật:
   ```bash
   make git-push
   ```

## 4. Tiêu chí Nghiệm thu (Acceptance Criteria)
Sau khi thiết lập hoặc đồng bộ, hãy kiểm tra các điều kiện sau:
- [ ] Lệnh `make ps` hiển thị tất cả các container (`app`, `db`, `nginx`, `redis`) ở trạng thái `Up` (healthy).
- [ ] Truy cập giao diện web nội bộ không có lỗi 500.
- [ ] Số lượng file trong `Avatar-driver/mastersns-driver/ange_mastersns` khớp với `Project-repo/ange_mastersns` (trừ thư mục `.git`).
- [ ] Database đã được nạp đủ dữ liệu (kiểm tra bảng `members` có dữ liệu).
