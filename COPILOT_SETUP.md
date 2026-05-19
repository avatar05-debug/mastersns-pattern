# Hướng dẫn Thiết lập GitHub Copilot CLI cho MasterSNS

Tài liệu này hướng dẫn cách cài đặt và cấu hình GitHub Copilot CLI để tối ưu hóa việc phát triển dự án MasterSNS, đặc biệt là tích hợp với các công cụ AI hỗ trợ (MCP).

## 1. Giới thiệu
Tài liệu này hướng dẫn cách cài đặt và cấu hình **GitHub Copilot CLI (Standalone)** để tối ưu hóa việc phát triển dự án MasterSNS, đặc biệt là tích hợp với các công cụ AI hỗ trợ (MCP).

*Lưu ý: Hướng dẫn này dành cho bản **Copilot CLI độc lập** (cài đặt qua curl/winget), không phải bản legacy `gh copilot` extension.*

## 2. Cài đặt
Tùy vào hệ điều hành bạn đang sử dụng, hãy chạy lệnh tương ứng:

- **macOS/Linux**:
  ```bash
  curl -fsSL https://gh.io/copilot-install | bash
  ```
- **Windows**:
  ```bash
  winget install GitHub.Copilot
  ```

Sau khi cài đặt, bạn có thể kiểm tra đường dẫn cấu hình cụ thể trên máy mình bằng lệnh:
```bash
copilot config path
```

## 3. Xác thực (Authentication)
Sau khi cài đặt, bạn cần đăng nhập vào tài khoản GitHub có đăng ký dịch vụ Copilot:
```bash
copilot auth sign-in
```
*Lưu ý: Bạn cần một gói thuê bao Copilot đang hoạt động để sử dụng công cụ này.*

## 4. Cấu hình MCP (Quan trọng)
Để Copilot CLI có thể sử dụng các công cụ chuyên biệt cho dự án như **Serena** (thao tác code an toàn) và **GitNexus** (phân tích kiến trúc), bạn cần kích hoạt tính năng MCP.

Mặc định trên **macOS**, file cấu hình sẽ nằm tại: `~/.copilot/mcp-config.json`.

Tạo hoặc chỉnh sửa file với nội dung sau:

```json
{
  "mcpServers": {
    "gitnexus": {
      "command": "gitnexus",
      "args": [
        "mcp"
      ],
      "description": "PRIMARY TOOL for all code searches and logic discovery. Use this INSTEAD of grep/find for semantic understanding of authentication, login, and architectural flows."
    },
    "serena": {
      "command": "serena",
      "args": [
        "start-mcp-server",
        "--context=copilot-cli"
      ],
      "description": "PRIMARY TOOL for reading and modifying code. Use this for deep file analysis and safe edits.",
      "type": "stdio"
    }
  }
}
```

## 5. Lưu ý về Bối cảnh dự án (Project Context)
**Rất quan trọng:** Cấu hình GitNexus và mã nguồn chính nằm trong thư mục `Avatar-driver/mastersns-driver`.

Để các công cụ AI (GitNexus, Serena) hoạt động chính xác nhất, bạn **PHẢI** di chuyển vào thư mục con trước khi bắt đầu chat:
```bash
cd Avatar-driver/mastersns-driver
copilot chat
```
Nếu đứng ở thư mục gốc, AI sẽ chỉ sử dụng các công cụ tìm kiếm cơ bản (grep) và không kích hoạt được các kỹ năng nâng cao của GitNexus.

## 6. Quy tắc quản lý Git & File lớn
Để tránh lỗi nén dữ liệu (inflate error) và vượt giới hạn GitHub (100MB), tuyệt đối không đẩy các file sau lên Git:

- **Dữ liệu Database:** Thư mục `docker/db/db_data/` (chứa các file `.ibd`).
- **Logs khổng lồ:** Các file `.gitnexus/lbug*`.
- **SQL Dumps:** Các file `.sql` có dung lượng lớn trong thư mục `mysql/`.

Các file này đã được cấu hình trong `.gitignore`. Nếu vô tình bị track, hãy dùng lệnh:
```bash
git rm --cached <đường_dẫn_file>
```

## 7. Danh sách MCP Servers Chi tiết

### Nhóm 1: Công cụ Đặc thù Dự án (Internal)

#### 1. Serena & GitNexus `[Yêu cầu API Key/Token]`
- **GitNexus**: Phân tích Knowledge Graph, tìm kiếm hàm/biến theo ngữ cảnh (thay vì chỉ grep từ khóa).
- **Serena**: Thực hiện chỉnh sửa mã nguồn thông minh và an toàn.
- **Thiết lập**:
  - Cấu hình biến môi trường trong `.zshrc` hoặc `.bashrc`:
    ```bash
    export GITNEXUS_EMBEDDING_URL=https://llm.nal.vn/v1
    export GITNEXUS_EMBEDDING_API_KEY=your-api-key-here
    ```

### Nhóm 2: Tra cứu & Tìm kiếm (External)
#### 2. Context7 `[Freemium]`
Tra cứu tài liệu thư viện mới nhất.
#### 3. Google Search
Tìm kiếm thông tin thời gian thực.

### Nhóm 3: Quản lý Mã nguồn & Dữ liệu
#### 4. GitHub
Quản lý PR/Issues.
#### 5. Filesystem
Cho phép AI đọc/ghi file trực tiếp (yêu cầu cấp quyền đường dẫn tuyệt đối).

## 8. Cách sử dụng hiệu quả
Trong phiên chat của Copilot CLI, hãy sử dụng các câu lệnh có ngữ cảnh:

- **Tìm kiếm thông minh:** "Sử dụng GitNexus tìm luồng xử lý Login trong FuelPHP."
- **Chỉnh sửa an toàn:** "Dùng Serena cập nhật logic kiểm tra password trong Model_Member."
- **Tra cứu tài liệu:** "Dùng Context7 tra cứu cách cấu hình Redis trong FuelPHP."

---
*Tài liệu này được cập nhật ngày 2026-05-19 cho dự án MasterSNS.*
