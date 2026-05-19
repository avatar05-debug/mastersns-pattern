# Hướng dẫn Thiết lập và Đồng bộ MasterSNS

Tài liệu này hướng dẫn quy trình cài đặt từ đầu cho một máy mới, sắp xếp theo thứ tự ưu tiên các bước cần thực hiện.

## 🛑 CẢNH BÁO (DANGER WARNING)
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

5. **Tự động hóa Kỹ năng (AutoSkills)**:
   Sử dụng `autoskills` để tự động phát hiện Tech Stack của dự án và cài đặt các kỹ năng AI (skills) phù hợp.
   - **Cách thực hiện**: Chạy lệnh sau tại thư mục gốc của dự án:
     ```bash
     npx autoskills
     ```
   - **Tác dụng**: Tự động cài đặt các kỹ năng bổ trợ dựa trên FuelPHP, Vue, TypeScript và Docker có trong dự án.

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

## Hướng dẫn sử dụng GitNexus CLI & API Gateway

Dự án sử dụng GitNexus để phân tích mã nguồn và tự động hóa tài liệu kiến trúc. Để tối ưu hiệu suất và sử dụng tài nguyên nội bộ, chúng ta cấu hình GitNexus kết nối qua API Gateway.

### 1. Cấu hình API Gateway cho GitNexus

Để sử dụng tính năng tra cứu thông minh và đồng bộ tài liệu, bạn cần cấu hình các thông số sau:

*   **Chạy giao diện Wiki với Gateway**:
    Sử dụng flag `--base-url` để trỏ về server nội bộ:
    ```bash
    npx gitnexus wiki --base-url https://llm.nal.vn
    ```

*   **Cấu hình Embedding cho lệnh `analyze`**:
    Để tính năng tìm kiếm ngữ nghĩa (semantic search) hoạt động, hãy thiết lập các biến môi trường sau trong file `.zshrc` hoặc `.bashrc`:
    ```bash
    export GITNEXUS_EMBEDDING_URL=https://llm.nal.vn/v1
    export GITNEXUS_EMBEDDING_API_KEY=your-key-here
    ```
    *Lưu ý: Liên hệ Leader để lấy API Key.*

### 2. Khi nào cần chạy lệnh GitNexus?

Việc chạy lệnh đúng thời điểm giúp duy trì chỉ mục (index) luôn mới và hỗ trợ AI đưa ra câu trả lời chính xác nhất.

*   **`npx gitnexus analyze`**:
    *   Sau khi thực hiện các thay đổi lớn về code (thêm module mới, đổi cấu trúc thư mục).
    *   Khi công cụ báo trạng thái index bị "stale" (cũ).
    *   Ngay sau khi merge các nhánh (Branch) lớn vào `main`.

*   **`npx gitnexus wiki`**:
    *   Khi bạn cần cập nhật hoặc xem tài liệu kiến trúc được tự động trích xuất.
    *   Khi có thành viên mới gia nhập dự án để họ nhanh chóng nắm bắt luồng code.
    *   Trước khi thực hiện các đợt Review kiến trúc lớn.

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

4. **Thiết lập Môi trường Local**:
   ```bash
   cp -r environments/development ange_mastersns/fuel/app/config/
   ```
   (Lưu ý: Thực hiện lệnh này tại thư mục `Avatar-driver/mastersns-driver/`)

5. **Clone Giao diện Admin**:
   ```bash
   cd ange_mastersns/fuel/app/classes/controller/
   git clone git@github.com:newbeescoltd/ange_admin.git admin
   ```
   (Lưu ý: Thực hiện lệnh này để thiết lập giao diện quản trị Admin)

---

## Bước 4: Khởi chạy Môi trường Docker
Sử dụng Makefile để tự động hóa việc khởi tạo container và dữ liệu.

> **Lưu ý quan trọng về Dữ liệu**:
> Một số file SQL có dung lượng rất lớn (`mastersns_mgpf.sql`, `mastersns_sandbox.sql`, `mastersns.sql`) không được đính kèm trong Git. 
> Trước khi thực hiện lệnh import, hãy liên hệ Admin để nhận các file này và đặt vào thư mục:
> `Avatar-driver/mastersns-driver/mysql/`

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
- [ ] `npx autoskills`: Các kỹ năng AI đã được cài đặt.
- [ ] Tính năng Agent Teams hoạt động.
