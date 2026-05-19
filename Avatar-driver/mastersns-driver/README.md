# Hướng dẫn sử dụng MasterSNS Driver

Tài liệu này cung cấp hướng dẫn cho các lập trình viên làm việc với repository **mastersns-driver**. Tài liệu bao gồm các nội dung về thiết lập môi trường, đồng bộ hóa với repository chính và các giao thức an toàn bắt buộc.

## 1. Cài đặt và Khởi chạy

Dự án sử dụng môi trường dựa trên Docker. Hãy đảm bảo bạn đã cài đặt Docker và Docker Compose.

| Lệnh | Mô tả |
|---------|-------------|
| `make init` | Khởi tạo dự án: bắt đầu các container và chạy các script thiết lập. |
| `make dev` | Khởi chạy môi trường với log được đính kèm vào terminal. |
| `make up` | Khởi chạy môi trường ở chế độ detached (chạy nền). |
| `make down` | Dừng và gỡ bỏ các container của môi trường. |
| `make reset` | **NGUY HIỂM**: Xóa sạch tất cả dữ liệu, volume và khởi tạo lại dự án từ đầu. |

- **Backend**: FuelPHP 1.8. Truy cập shell thông qua `docker-compose exec angue_app /bin/bash`.
- **Frontend**: Vue/TS với Laravel Mix. Đóng gói (bundling) thông qua `npm run dev` hoặc `npm run pro` bên trong thư mục `ange_mastersns`.

### Dữ liệu và Nhập liệu (Data & Import)

Lệnh `make import` được sử dụng để nạp dữ liệu ban đầu vào cơ sở dữ liệu.

- **Lệnh thực hiện**: `make import`
- **Tác vụ**: Thực thi script `scripts/import-data.sh`.
- **Dữ liệu được nạp**:
    - `mastersns_mgpf`: Dữ liệu từ `mysql/mastersns_mgpf.sql`.
    - `mastersns_sandbox`: Dữ liệu từ `mysql/mastersns_sandbox.sql`.
    - `mastersns`: Dữ liệu từ `mysql/mastersns.sql`.
- **Điều kiện tiên quyết**: Các container Docker (đặc biệt là container `db`) phải đang chạy (`make up`).
- **Cơ chế đánh dấu**: Sau khi hoàn tất, một file ẩn `.data_imported` sẽ được tạo để đánh dấu trạng thái đã nạp dữ liệu.

## 2. Đồng bộ hóa với Project-repo

`mastersns-driver` đóng vai trò là trình điều khiển phát triển (development driver) cho `Project-repo` chính. Sử dụng các lệnh sau để đồng bộ hóa các thay đổi:

- **Đẩy thay đổi lên Project-repo (Push)**:
  ```bash
  make git-push
  ```
  Lệnh này sẽ đồng bộ hóa nhánh hiện tại của bạn với repository mục tiêu và tạo một commit tự động đồng bộ (auto-sync commit).

- **Lấy thay đổi từ Project-repo (Pull)**:
  ```bash
  make git-pull
  ```
  Lệnh này sẽ lấy trạng thái mới nhất từ repository mục tiêu về môi trường driver của bạn.

## 3. Sử dụng Công cụ & Giao thức An toàn

### Claude Code
Sử dụng CLI tiêu chuẩn cho các tác vụ tự động. Luôn tuân thủ các hướng dẫn được định nghĩa trong `CLAUDE.md`.

### GitNexus (Bắt buộc Phân tích Tác động)
GitNexus cung cấp trí tuệ mã nguồn chuyên sâu. Bạn **BẮT BUỘC** phải tuân thủ các quy tắc an toàn (safety gates) sau:
1. **TRƯỚC khi chỉnh sửa**: Chạy `gitnexus_impact({target: "SymbolName", direction: "upstream"})`.
2. **Kiểm tra Bán kính Ảnh hưởng (Blast Radius)**: Phân tích các hàm gọi trực tiếp (direct callers) và các quy trình bị ảnh hưởng.
3. **Cảnh báo An toàn**: Nếu mức độ rủi ro là **HIGH** (Cao) hoặc **CRITICAL** (Nguy cấp), phải cảnh báo người dùng trước khi tiếp tục.
4. **Sau khi chỉnh sửa**: Chạy `gitnexus_detect_changes()` trước khi commit để xác minh phạm vi tác động.

### Serena (Khám phá & Chỉnh sửa Symbolic)
Các công cụ của Serena được ưu tiên cho việc thao tác với mã nguồn:
- **Khám phá**: Sử dụng `get_symbols_overview` hoặc `find_symbol` thay vì dùng lệnh `Read` thuần túy.
- **Chỉnh sửa**: Sử dụng `replace_symbol_body`, `insert_after_symbol`, hoặc `replace_content` (chế độ regex).
- **Số dòng**: Lưu ý rằng Serena sử dụng số dòng **bắt đầu từ 0** (0-based).

### OMC (Điều phối)
Điều phối các agent chuyên biệt thông qua các skill `/oh-my-claudecode`:
- **Tiêu chuẩn**: `sonnet` (mặc định).
- **Kiến trúc phức tạp**: `opus`.
- **Nội dung/Nhân vật**: `writer-memory` để kiểm thử engine tính cách.

---

## 6. Hướng dẫn chi tiết về Công cụ Trí tuệ Nhân tạo (Detailed AI Tools Guide)

Phần này cung cấp hướng dẫn chi tiết về cách sử dụng hệ thống AI tích hợp trong dự án để đảm bảo an toàn và hiệu quả cao nhất.

### 6.1. Claude Code CLI
Claude Code là giao diện dòng lệnh (CLI) cho phép bạn thực hiện các tác vụ lập trình tự động một cách an toàn.

- **Vị trí khởi chạy (Quan trọng)**: Bạn nên chạy lệnh `claude` tại thư mục gốc của repository driver (`/Users/avatar05/www/Projects/mastersns/Avatar-driver/mastersns-driver/`).
- **Lý do**:
    - **Ngữ cảnh đầy đủ**: Giúp Claude truy cập và hiểu các file cấu hình quan trọng như `CLAUDE.md`, `.claude/`, `.omc/` và `Makefile`.
    - **An toàn & Chính xác**: Đảm bảo các quy tắc an toàn (safety gates) được kích hoạt và Claude có thể sử dụng các lệnh `make` một cách chính xác nhất.
- **Tác vụ tự động**: Sử dụng CLI cho các yêu cầu như "Fix bug X", "Implement feature Y", hoặc "Refactor component Z".
- **Quản lý ngữ cảnh**: 
    - Hệ thống sử dụng `.claude/` để lưu trữ cấu hình và lịch sử.
    - `project-memory.json` (trong `.omc/`) lưu trữ các kiến thức quan trọng về project để Claude không quên giữa các phiên làm việc.
- **Lưu ý**: Luôn đọc `CLAUDE.md` để biết các lệnh và quy ước mới nhất.

### 6.2. GitNexus: Giao thức An toàn Bắt buộc
GitNexus là hệ thống phân tích mã nguồn dựa trên đồ thị cuộc gọi. Bạn **BẮT BUỘC** phải sử dụng nó để ngăn chặn lỗi hệ thống.
- **Phân tích tác động (Impact Analysis)**: TRƯỚC KHI sửa bất kỳ hàm/class nào, PHẢI chạy `gitnexus_impact`.
    - Xem kỹ **Blast Radius**: Danh sách các hàm gọi nó và các luồng thực thi (execution flows) bị ảnh hưởng.
    - Nếu rủi ro là **HIGH** hoặc **CRITICAL**, dừng lại và kiểm tra kỹ với senior hoặc khách hàng.
- **Xác minh sau khi sửa**: TRƯỚC KHI commit, chạy `gitnexus_detect_changes` để đảm bảo bạn không vô tình làm hỏng các phần khác không liên quan.
- **Khám phá**: Sử dụng `gitnexus_query` để tìm hiểu "Làm thế nào để X hoạt động?" thay vì tìm kiếm văn bản đơn thuần.

#### 6.2.1. Lệnh CLI quan trọng
- `gitnexus analyze`: Chạy lệnh này khi bạn vừa thực hiện những thay đổi lớn về cấu trúc code, thêm nhiều file mới hoặc khi các công cụ GitNexus báo cáo rằng chỉ mục (index) đã cũ (stale). Lệnh này sẽ phân tích lại toàn bộ mã nguồn để cập nhật đồ thị kiến thức.
- `gitnexus wiki`: Chạy lệnh này khi bạn muốn tạo hoặc cập nhật tài liệu Wiki tự động dựa trên kiến thức mã nguồn mà GitNexus đã thu thập được. Wiki này giúp tra cứu kiến trúc và luồng thực thi (execution flows) một cách trực quan.

### 6.3. Serena: Giao thức Symbolic (Ưu tiên)
Serena cung cấp các công cụ thao tác với mã nguồn ở cấp độ ký hiệu (symbolic level), chính xác hơn việc đọc/ghi file thông thường.
- **Thay thế lệnh Read**: Luôn ưu tiên `get_symbols_overview` để xem cấu trúc file và `find_symbol` để đọc nội dung hàm cụ thể.
- **Công cụ chỉnh sửa**:
    - `replace_symbol_body`: Thay thế toàn bộ nội dung một hàm/method mà không lo về việc cắt dán nhầm dòng.
    - `insert_after_symbol` / `insert_before_symbol`: Thêm code mới vào đúng vị trí logic.
- **Chỉ số dòng**: Serena sử dụng hệ thống **0-based indexing** (dòng đầu tiên là dòng 0). Hãy cẩn thận khi đối chiếu với trình soạn thảo code (thường là 1-based).

### 6.4. Oh My Claude (OMC) & Agent Orchestration
Dự án sử dụng OMC để điều phối các Agent chuyên biệt, giúp tự động hóa các luồng công việc phức tạp.
- **Tư duy theo Task**: Chia nhỏ công việc vào danh sách task (`TaskCreate`, `TaskList`).
- **Phân cấp Agent (Tiered Agents)**:
    - **Executor**: Thực hiện code (Sonnet hoặc Opus).
    - **Writer**: Chuyên trách viết tài liệu (như file này).
    - **Verifier**: Kiểm tra lại code và tài liệu sau khi hoàn thành.
- **Ví dụ về lệnh OMC**:
    - `/oh-my-claudecode:prime --quick`: Để chuẩn bị nhanh ngữ cảnh cho một phiên làm việc mới.
    - `/oh-my-claudecode:ralplan "mô tả nhiệm vụ"`: Bắt đầu quy trình lập trình đồng thuận cho các tác vụ phức tạp.
    - `/oh-my-claudecode:ultrawork "danh sách tác vụ"`: Chạy đồng thời nhiều tác vụ độc lập bằng các agent chuyên biệt.
    - `/oh-my-claudecode:verify`: Thực hiện xác minh dựa trên bằng chứng cho công việc đã hoàn thành.
- **Lệnh đặc biệt**: Sử dụng `/team` để phối hợp nhiều agent hoặc `/autopilot` cho các quy trình tự động hoàn toàn.
- **Tham khảo bên ngoài**: Để tìm hiểu thêm về bộ công cụ Oh My Claude, hãy truy cập: [https://github.com/yeachan-heo/oh-my-claudecode](https://github.com/yeachan-heo/oh-my-claudecode).

---

## 4. Hướng dẫn sử dụng (Tóm tắt)

### Cài đặt và Khởi chạy
- `make init`: Khởi tạo dự án lần đầu.
- `make up` / `make down`: Bật/Tắt môi trường Docker.
- `make dev`: Chạy môi trường và xem log trực tiếp.

### Đồng bộ hóa (Syncing)
- `make git-push`: Đẩy code từ Driver sang repository chính.
- `make git-pull`: Cập nhật code mới nhất từ repository chính về Driver.

### 🛡️ Quy trình An toàn Bắt buộc (Mandatory Safety Gates)
Để đảm bảo tính ổn định của hệ thống Aocca/MasterSNS, tất cả các thay đổi code **PHẢI** tuân thủ:

1. **Phân tích tác động (GitNexus)**: BẮT BUỘC chạy `gitnexus_impact` TRƯỚC KHI chỉnh sửa bất kỳ hàm, class hoặc method nào.
2. **Cảnh báo rủi ro**: Nếu GitNexus báo cáo rủi ro **HIGH** hoặc **CRITICAL**, phải thông báo cho người dùng ngay lập tức.
3. **Kiểm tra sau chỉnh sửa**: Chạy `gitnexus_detect_changes()` TRƯỚC KHI commit để đảm bảo thay đổi không gây ảnh hưởng ngoài ý muốn.
4. **Sử dụng Serena**: Ưu tiên các công cụ symbolic (Serena) để đọc và sửa code một cách tối ưu và chính xác.

## 5. Tài liệu Tham khảo Kỹ thuật
- **Kiến trúc & Hướng dẫn**: Xem [CLAUDE.md](./CLAUDE.md).
- **Giao thức Agent**: Xem [AGENTS.md](./AGENTS.md).
- **Chỉ mục Trí tuệ Mã nguồn**: `mastersns-driver`.
