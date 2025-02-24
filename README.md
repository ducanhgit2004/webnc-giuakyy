# Tên Dự Án: Hệ Thống Quản Lý Sinh Viên

## Được Phát Triển Bởi:
- [Nguyễn Đức Anh]


## Mô Tả Ứng Dụng
Hệ thống quản lý sinh viên là một ứng dụng web giúp quản lý các môn học, sinh viên, giảng viên và khoa một cách hiệu quả. Ứng dụng cung cấp các chức năng CRUD (Tạo, Đọc, Sửa, Xóa, Xem chi tiết) cho các đối tượng chính: Khoa, Giảng viên, Sinh viên và Môn học.

## Mục Đích
- Quản lý thông tin các khoa
- Quản lý thông tin giảng viên và sinh viên
- Quản lý thông tin các môn học 
- Cung cấp giao diện người dùng dễ sử dụng
- Hiển thị dữ liệu hiệu quả thông qua DataTables

## Công Nghệ
Dự án sử dụng các công nghệ sau:
- Laravel Framework (cập nhật lên phiên bản mới nhất)
- PHP 8.x
- MySQL - Aiven
- DataTables với jQuery
- AdminLTE 3.x (giao diện admin)
- HTML, CSS, JavaScript
- Laravel Repository Pattern
- Laravel Service Pattern
- Laravel breeze

## Quá Trình Phát Triển Phần Mềm

### Sơ Đồ Khối (UML) - Cấu trúc Database
(https://github.com/user-attachments/assets/7a07b7bc-511a-47d0-94dc-884962d69cb3)



### Sơ Đồ Chức Năng (Sơ Đồ Thuật Toán)
mermaid
flowchart TD
    A[Người dùng truy cập hệ thống] --> B[Chọn module quản lý]
    B --> C{Chọn chức năng}
    C --> D[Thực hiện CRUD]
    C --> E[Xem danh sách]
    C --> F[Tìm kiếm]
    C --> G[Sắp xếp]


## Chu Trình Phát Triển
1. Phases:
    - Analysis: Phân tích yêu cầu và thiết kế database
    - Design: Áp dụng các design patterns (Repository, Service)
    - Implementation: Viết code theo các patterns đã thiết kế
    - Testing: Unit tests, Feature tests
    - Deployment: CI/CD pipeline

## Deployment
1. Cài đặt môi trường
   
   composer create-project laravel/laravel course-management
   cd course-management
   

2. Tạo database
   
   CREATE DATABASE course_management;
   

3. Configure .env
   
   DB_CONNECTION=mysql
   
   DB_HOST=127.0.0.1
   
   DB_PORT=3306
   
   DB_DATABASE=student_management

   DB_USERNAME=root
   
   DB_PASSWORD=
   

5. Install dependencies
   
   composer require yajra/laravel-datatables-oracle
   npm install admin-lte@3.1.0
   

6. Run migrations
   
   php artisan migrate
   php artisan db:seed
   

7. Deploy to server
   
   php artisan serve
   

## Lưu ý về cải tiến cấu trúc
- Áp dụng Repository Pattern giúp tách biệt logic truy cập dữ liệu từ controllers
- Service Layer chứa business logic, giúp code dễ test và bảo trì
- Request Validation giúp tách biệt logic validation
- API Resources chuẩn hóa dữ liệu trả về
- Events & Listeners xử lý các tác vụ phụ không đồng bộ
