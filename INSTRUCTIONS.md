# Hướng dẫn Thiết lập và Đồng bộ MasterSNS

Tài liệu này hướng dẫn quy trình cài đặt từ đầu cho một máy mới, sắp xếp theo thứ tự ưu tiên các bước cần thực hiện.

## 🛑 CẢNH BÁO NGUY HIỂM (DANGER WARNING)
Lệnh đồng bộ (`make git-push` và `make git-pull`) sử dụng `rsync --delete`. 
**Bất kỳ file nào có ở thư mục đích nhưng không có ở thư mục nguồn sẽ bị XÓA VĨNH VIỄN.**
- Luôn chạy `make git-push-dry` hoặc `make git-pull-dry` trước khi thực hiện đồng bộ thật.
- Kiểm tra kỹ danh sách file bị xóa trong output của lệnh dry-run.

---

## Bước 0: Cài đặt và Cấu hình Claude Code
Trước khi bắt đầu, bạn cần cài đặt Claude Code CLI và cấu hình kết nối thông qua API Gateway của công ty.

1. **Cài đặt Claude Code**:
   ```bash
   npm install -g @anthropic-ai/claude-code
   ```

2. **Cấu hình Môi trường (BẮT BUỘC)**:
   Để Claude Code có thể hoạt động ổn định và hỗ trợ đầy đủ các tính năng (như Agent Teams), bạn cần cấu hình file `~/.claude/settings.json` như sau:
   
   ```json
   {
     "env": {
       "ANTHROPIC_DEFAULT_HAIKU_MODEL": "gemini/gemini-3-flash-preview",
       "ANTHROPIC_DEFAULT_SONNET_MODEL": "gemini/gemini-3-flash-preview",
       "ANTHROPIC_DEFAULT_OPUS_MODEL": "gemini/gemini-3-flash-preview",
       "ANTHROPIC_AUTH_TOKEN": "Your_Key_Ở_Đây",
       "ANTHROPIC_BASE_URL": "https://llm.nal.vn",
       "API_TIMEOUT_MS": "3000000",
       "MCP_TIMEOUT": "60000",
       "MCP_TOOL_TIMEOUT": "120000",
       "CLAUDE_CODE_EXPERIMENTAL_AGENT_TEAMS": "3,4,5",
       "CLAUDE_CODE_EXPERIMENTAL_AGENT_TEAMS_ENABLED": "true"
     }
   }
   ```
   *Lưu ý: Thay `Your_Key_Ở_Đây` bằng API Key được cấp và điều chỉnh tên model nếu cần thiết.*

3. **Đăng nhập**:
   ```bash
   claude auth login
   ```

---

## Bước 1: Hệ thống Tri thức và Chỉ dẫn (Memory & Guidance)
Dự án sử dụng cơ chế quản lý tri thức đặc biệt của Claude Code để tối ưu hóa hiệu quả làm việc.

1. **Cấu hình Claude Code (CLAUDE.md)**:
   File này chứa các chỉ dẫn cốt lõi về phong cách code, lệnh terminal và kiến trúc dự án. Claude sẽ tự động đọc file này mỗi khi bắt đầu phiên làm việc.
   - **Vị trí**: `Avatar-driver/mastersns-driver/CLAUDE.md`.
   - **Cách dùng**: Bạn không cần làm gì, Claude sẽ tự tuân thủ các quy tắc trong này.

2. **Hệ thống Agent (AGENTS.md)**:
   Định nghĩa cách các Agent (như Planner, Architect, Executor) phối hợp và các "Hard Constraints" (ràng buộc cứng) khi thao tác với GitNexus.
   - **Vị trí**: `Avatar-driver/mastersns-driver/AGENTS.md`.

3. **Cơ chế Memory (Persistent Knowledge)**:
   Claude Code lưu trữ tri thức về dự án trong thư mục `.claude/memory/`.
   - **Lưu tri thức**: Sử dụng lệnh `/oh-my-claudecode:remember` để lưu lại các quyết định quan trọng, bug khó hoặc logic nghiệp vụ phức tạp.
   - **Truy xuất**: Claude sẽ tự động tìm kiếm trong memory để giải quyết các vấn đề tương tự trong tương lai.

4. **Dreaming (Context Compression)**:
   Khi cuộc hội thoại quá dài, Claude sẽ thực hiện "Dreaming" để tóm tắt bối cảnh quan trọng và giải phóng bộ nhớ. Quá trình này giúp duy trì hiệu suất làm việc mà không làm mất đi các thông tin then chốt.

---

## Bước 2: Cấu hình Công cụ AI Hỗ trợ (MCP & Plugins)
Sau khi có Claude Code, hãy thiết lập các công cụ bổ trợ.

1. **Cài đặt oh-my-claudecode (OMC)**:
   Mở Claude Code và chạy lệnh:
   ```bash
   /oh-my-claudecode:omc-setup
   ```

2. **Cấu hình MCP GitNexus**:
   Thêm vào file `~/.claude/mcp.json`:
   ```json
   {
     "mcpServers": {
       "gitnexus": {
         "command": "npx",
         "args": ["-y", "gitnexus@latest", "mcp"]
       }
     }
   }
   ```

3. **Cài đặt Plugin Bắt buộc**:
   Đảm bảo các plugin sau đã được bật trong Claude Code (kiểm tra qua `/config`):
   - `serena`: Công cụ thao tác code an toàn.
   - `context7`: Tra cứu tài liệu thư viện.

---

## Bước 3: Thiết lập Cấu trúc Thư mục
Dự án sử dụng mô hình **Driver/Project Pattern**.

1. **Clone repository pattern**:
   ```bash
   git clone git@github.com:newbeescoltd/mastersns-pattern.git
   cd mastersns-pattern
   rm -rf .git  # Xóa lịch sử git của pattern để dùng git mới
   ```

2. **Khởi tạo Git cho Driver**:
   ```bash
   cd Avatar-driver/mastersns-driver
   git init
   ```

3. **Thêm Submodule Source Code**:
   ```bash
   git submodule add git@github.com:newbeescoltd/ange_mastersns.git ange_mastersns
   git submodule update --init --recursive
   ```

---

## Bước 4: Khởi chạy Môi trường Docker
Sử dụng Makefile để tự động hóa việc khởi tạo container và dữ liệu.

```bash
# Tại Avatar-driver/mastersns-driver/
make init    # Khởi động Docker, chạy Migrations
make import  # Nạp dữ liệu mẫu vào Database
```

---

## Bước 5: Nguyên tắc Phát triển & Đồng bộ

### 1. Nguyên tắc "Source of Truth"
- **CHỈ lập trình tại**: `Avatar-driver/mastersns-driver/ange_mastersns`.
- Tuyệt đối KHÔNG sửa code trực tiếp trong `Project-repo`.

### 2. Quy trình Đồng bộ An toàn
1. **Kiểm tra trước (Dry-run)**: `make git-push-dry`
2. **Xác nhận & Đồng bộ thật**: `make git-push`

---

## Bước 6: Kiểm tra (Acceptance Criteria)
- [ ] `make ps`: Tất cả container đều `Up`.
- [ ] Claude Code hoạt động (kết nối thành công qua Gateway).
- [ ] `gitnexus_impact`: MCP hoạt động bình thường.
- [ ] Tính năng Agent Teams hoạt động.
