---
name: mastersns-environment-management
description: Hướng dẫn quản lý môi trường Docker và cấu trúc Submodule trong dự án MasterSNS
triggers:
  - "lỗi docker"
  - "chạy lệnh backend"
  - "không tìm thấy file trong ange_mastersns"
  - "cấu trúc dự án"
---

# MasterSNS Environment Management

## The Insight
Dự án được thiết kế theo mô hình "Driver-Submodule". Repo gốc (`mastersns-driver`) chỉ chứa cấu hình Docker và scripts điều phối, trong khi code ứng dụng thực tế nằm trong submodule `ange_mastersns`. Tất cả các lệnh thực thi (PHP, Composer, Tests) PHẢI được chạy thông qua Docker container thay vì môi trường local.

## Why This Matters
Nếu chạy lệnh trực tiếp ở máy host (local), bạn sẽ gặp lỗi thiếu thư viện, sai phiên bản PHP hoặc không kết nối được Database. Ngoài ra, việc quên không `cd` vào submodule sẽ làm các công cụ tìm kiếm code (grep/find) bị nhầm lẫn về đường dẫn gốc.

## Recognition Pattern
- Khi cần cài đặt dependencies (`composer install`).
- Khi cần chạy migrations hoặc tests.
- Khi cần truy cập vào terminal của ứng dụng (`make up`, `docker exec`).

## The Approach
1. **Luôn kiểm tra trạng thái Docker**: Sử dụng `make up` từ thư mục gốc trước khi làm việc.
2. **Thực thi lệnh Backend**: Phải dùng `docker-compose exec angue_app php oil [command]`.
3. **Đường dẫn file**: Khi làm việc với logic ứng dụng, đường dẫn gốc luôn bắt đầu từ `/ange_mastersns/fuel/app/...`.
4. **Đồng bộ**: Sử dụng `make git-pull` để đảm bảo cả Driver và Submodule đều được cập nhật đồng bộ.

## Verification Evidence
- Lệnh `make up` trả về exit code 0.
- `docker ps` hiển thị container `angue_app` đang running.
- Truy cập thành công vào `php oil test`.
