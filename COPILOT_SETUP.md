# Hướng dẫn Thiết lập GitHub Copilot CLI cho MasterSNS

Tài liệu này hướng dẫn cách cài đặt và cấu hình GitHub Copilot CLI để tối ưu hóa việc phát triển dự án MasterSNS, đặc biệt là tích hợp với các công cụ AI hỗ trợ (MCP).

## 1. Giới thiệu
GitHub Copilot CLI mang sức mạnh của AI vào terminal, giúp bạn thực hiện các thao tác dòng lệnh, giải thích mã nguồn và tương tác với hệ thống tri thức của dự án MasterSNS một cách nhanh chóng.

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

## 3. Xác thực (Authentication)
Sau khi cài đặt, bạn cần đăng nhập vào tài khoản GitHub có đăng ký dịch vụ Copilot:
```bash
gh auth login
```
*Lưu ý: Bạn cần một gói thuê bao Copilot đang hoạt động để sử dụng công cụ này.*

## 4. Cấu hình MCP (Quan trọng)
Để Copilot CLI có thể sử dụng các công cụ chuyên biệt cho dự án như **Serena** (thao tác code an toàn) và **GitNexus** (phân tích kiến trúc), bạn cần kích hoạt tính năng MCP.

Tạo hoặc chỉnh sửa file cấu hình tại `~/.config/github-copilot/mcp-config.json`:

```json
{
  "mcpServers": {
    "serena": {
      "command": "npx",
      "args": ["-y", "@serena/mcp-server"]
    },
    "gitnexus": {
      "command": "npx",
      "args": ["-y", "gitnexus@latest", "mcp"]
    }
  }
}
```

## 5. Danh sách MCP Servers Chi tiết

Dưới đây là hướng dẫn chi tiết về các MCP Server được sử dụng trong dự án, bao gồm thông tin chi phí và cách thiết lập.

### Nhóm 1: Công cụ Đặc thù Dự án (Internal)

#### 1. Serena & GitNexus `[Yêu cầu API Key/Token]`
Bộ công cụ cốt lõi để phân tích kiến trúc, tìm kiếm thông minh và chỉnh sửa mã nguồn an toàn trong MasterSNS.
- **Giá**: Cung cấp nội bộ cho thành viên dự án.
- **Thiết lập**:
  - Liên hệ **Admin dự án** hoặc **Leader** để lấy API Key.
  - Cấu hình biến môi trường trong `.zshrc` hoặc `.bashrc`:
    ```bash
    export GITNEXUS_EMBEDDING_URL=https://llm.nal.vn/v1
    export GITNEXUS_EMBEDDING_API_KEY=your-api-key-here
    ```

### Nhóm 2: Tra cứu & Tìm kiếm (External)

#### 2. Context7 `[Freemium]`
Cung cấp tài liệu và ví dụ code mới nhất cho các thư viện/framework (React, Next.js, v.v.).
- **Giá**: Miễn phí gói cơ bản, yêu cầu đăng ký cho các tính năng nâng cao.
- **Thiết lập**:
  - Đăng ký tài khoản tại [context7.com](https://context7.com).
  - Lấy API Key từ dashboard.
  - Thêm vào cấu hình:
    ```json
    "context7": {
      "command": "npx",
      "args": ["-y", "context7-mcp"],
      "env": { "CONTEXT7_API_KEY": "your-context7-key-here" }
    }
    ```

#### 3. Google Search `[Yêu cầu API Key/Token]`
Cho phép AI tìm kiếm thông tin thời gian thực trên Internet.
- **Giá**: Miễn phí 100 truy vấn/ngày thông qua Google Custom Search Engine (CSE).
- **Thiết lập**:
  - Tạo API Key tại [Google Cloud Console](https://console.cloud.google.com/).
  - Tạo Search Engine ID (CX) tại [Google Programmable Search Engine](https://programmablesearchengine.google.com/).
  - Cấu hình:
    ```json
    "google-search": {
      "command": "npx",
      "args": ["-y", "@modelcontextprotocol/server-google-search"],
      "env": {
        "GOOGLE_API_KEY": "your-google-api-key-here",
        "GOOGLE_CSE_ID": "your-cse-id-here"
      }
    }
    ```

### Nhóm 3: Quản lý Mã nguồn & Dữ liệu

#### 4. GitHub `[Miễn phí]`
Tích hợp sâu với GitHub để quản lý Issues, Pull Requests và Repository.
- **Giá**: Miễn phí.
- **Thiết lập**:
  - Truy cập [GitHub Personal Access Tokens](https://github.com/settings/tokens).
  - Tạo một **Classic Token** với scope là `repo` (và `user` nếu cần).
  - Cấu hình:
    ```json
    "github": {
      "command": "npx",
      "args": ["-y", "@modelcontextprotocol/server-github"],
      "env": { "GITHUB_PERSONAL_ACCESS_TOKEN": "your-github-pat-here" }
    }
    ```

#### 5. Graphiti `[Miễn phí / Freemium]`
Xây dựng và truy vấn đồ thị tri thức (Knowledge Graph) từ dữ liệu mã nguồn.
- **Giá**: Miễn phí phần server MCP, yêu cầu instance Neo4j.
- **Thiết lập**:
  - **Phụ thuộc**: Yêu cầu cài đặt hoặc có quyền truy cập vào cơ sở dữ liệu **Neo4j**.
  - Cấu hình thông tin kết nối Neo4j:
    ```json
    "graphiti": {
      "command": "npx",
      "args": ["-y", "graphiti-mcp"],
      "env": {
        "NEO4J_URI": "bolt://localhost:7687",
        "NEO4J_USERNAME": "neo4j",
        "NEO4J_PASSWORD": "your-password-here"
      }
    }
    ```

### Nhóm 4: Tự động hóa & Khác

#### 6. Playwright / Bright Data `[Miễn phí / Freemium]`
Tự động hóa trình duyệt để kiểm thử hoặc trích xuất dữ liệu web.
- **Giá**: Playwright miễn phí; Bright Data là dịch vụ trả phí (Proxy/Scraping).
- **Thiết lập**:
  ```json
  "playwright": {
    "command": "npx",
    "args": ["-y", "@modelcontextprotocol/server-playwright"]
  }
  ```

#### 7. Filesystem `[Miễn phí]`
Cho phép AI đọc/ghi file trực tiếp trong các thư mục được chỉ định.
- **Thiết lập**: Phải chỉ định rõ đường dẫn tuyệt đối mà AI được phép truy cập.
  ```json
  "filesystem": {
    "command": "npx",
    "args": ["-y", "@modelcontextprotocol/server-filesystem", "/Users/yourname/projects/mastersns"]
  }
  ```

## 6. Biến môi trường hệ thống
Ngoài cấu hình trong JSON, hãy đảm bảo các biến sau có mặt trong `.zshrc` hoặc `.bashrc`:

```bash
export GITNEXUS_EMBEDDING_URL=https://llm.nal.vn/v1
export GITNEXUS_EMBEDDING_API_KEY=your-key-here
```

## 7. Cách sử dụng
Để bắt đầu phiên làm việc, chạy:
```bash
gh copilot chat
```

Bạn có thể yêu cầu AI:
- "Sử dụng GitNexus tìm tất cả các API route liên quan đến User."
- "Dùng Context7 tra cứu cách sử dụng middleware trong Next.js 14."
- "Yêu cầu GitHub liệt kê các Pull Request đang chờ review của tôi."

## 8. GitHub CLI Extension: Awesome Copilot
### Giới thiệu
**Awesome Copilot** là một extension mạnh mẽ cho GitHub CLI (`gh`), cung cấp một bộ sưu tập các lệnh và tiện ích bổ sung để làm việc hiệu quả hơn với Copilot ngay trong terminal. Nó giúp thu hẹp khoảng cách giữa việc đặt câu hỏi và thực thi các thao tác thực tế trên repository.

### Cài đặt
Để cài đặt extension này, bạn cần đảm bảo đã cài đặt GitHub CLI (`gh`), sau đó chạy lệnh:
```bash
gh extension install github/awesome-copilot
```

### Cách sử dụng
Sau khi cài đặt, bạn có thể gọi các tính năng của nó thông qua:
```bash
gh awesome-copilot [lệnh]
```

Một số tính năng nổi bật:
- **Giải thích lỗi**: Tự động phân tích và đề xuất cách sửa cho lỗi terminal cuối cùng.
- **Tạo PR description**: Tự động soạn thảo nội dung PR dựa trên các thay đổi code.
- **Tối ưu hóa workflow**: Đề xuất các lệnh git hoặc script phù hợp với ngữ cảnh hiện tại.

Sử dụng kết hợp với `gh copilot chat` để có trải nghiệm AI toàn diện trên dòng lệnh.

---
*Lưu ý: Sau khi thay đổi cấu hình MCP, hãy khởi động lại terminal hoặc ứng dụng để áp dụng.*

---
*Tài liệu này được tối ưu cho quy trình làm việc tại MasterSNS.*
