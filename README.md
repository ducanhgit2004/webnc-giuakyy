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
- Laravel Events & Listeners

## Quá Trình Phát Triển Phần Mềm

### Sơ Đồ Khối (UML) - Cấu trúc Database
(![webgk drawio](https://github.com/user-attachments/assets/baa31540-22e5-43a9-8a86-60946f76996e)

### Sơ Đồ Cấu Trúc Project - Nâng Cấp
mermaid
graph TB
    User((User))
    
    subgraph "Course Management System"
        subgraph "Web Interface"
            WebApp["Web Application<br>(Laravel Blade)"]
            
            subgraph "Frontend Components"
                AuthViews["Authentication Views<br>(Blade Templates)"]
                CourseViews["Course Management Views<br>(Blade Templates)"]
                TeacherViews["Teacher Management Views<br>(Blade Templates)"]
                StudentViews["Student Management Views<br>(Blade Templates)"]
                ProfileViews["Profile Management Views<br>(Blade Templates)"]
            end
        end
        
        subgraph "Application Core"
            Router["Router<br>(Laravel Routes)"]
            
            subgraph "Controllers"
                AuthController["Auth Controllers<br>(PHP)"]
                CourseController["Course Controller<br>(PHP)"]
                TeacherController["Teacher Controller<br>(PHP)"]
                StudentController["Student Controller<br>(PHP)"]
                ProfileController["Profile Controller<br>(PHP)"]
            end
            
            subgraph "Models"
                UserModel["User Model<br>(Eloquent)"]
                CourseModel["Course Model<br>(Eloquent)"]
                TeacherModel["Teacher Model<br>(Eloquent)"]
                StudentModel["Student Model<br>(Eloquent)"]
                EnrollmentModel["Enrollment Model<br>(Eloquent)"]
            end
            
            subgraph "Services"
                AuthService["Authentication Service<br>(Laravel Breeze)"]
                DataTables["DataTables Service<br>(Yajra)"]
                ValidationService["Validation Service<br>(Laravel)"]
            end
        end
        
        subgraph "Data Layer"
            Database[("Database<br>SQLite")]
            Cache["Cache Storage<br>(Laravel Cache)"]
        end
    end

    %% Connections
    User -->|interacts with| WebApp
    
    %% Frontend to Router
    WebApp -->|routes requests to| Router
    
    %% Router to Controllers
    Router -->|dispatches to| AuthController
    Router -->|dispatches to| CourseController
    Router -->|dispatches to| TeacherController
    Router -->|dispatches to| StudentController
    Router -->|dispatches to| ProfileController
    
    %% Controllers to Models
    AuthController -->|uses| UserModel
    CourseController -->|manages| CourseModel
    TeacherController -->|manages| TeacherModel
    StudentController -->|manages| StudentModel
    ProfileController -->|manages| UserModel
    
    %% Models to Database
    UserModel -->|persists in| Database
    CourseModel -->|persists in| Database
    TeacherModel -->|persists in| Database
    StudentModel -->|persists in| Database
    EnrollmentModel -->|persists in| Database
    
    %% Service Connections
    AuthController -->|uses| AuthService
    CourseController -->|uses| DataTables
    TeacherController -->|uses| DataTables
    StudentController -->|uses| DataTables
    
    %% View Connections
    AuthController -->|renders| AuthViews
    CourseController -->|renders| CourseViews
    TeacherController -->|renders| TeacherViews
    StudentController -->|renders| StudentViews
    ProfileController -->|renders| ProfileViews
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
   DB_DATABASE=course_management
   DB_USERNAME=root
   DB_PASSWORD=
   

4. Install dependencies
   
   composer require yajra/laravel-datatables-oracle
   npm install admin-lte@3.1.0
   

5. Run migrations
   
   php artisan migrate
   php artisan db:seed
   

6. Deploy to server
   
   php artisan serve
   

## Lưu ý về cải tiến cấu trúc
- Áp dụng Repository Pattern giúp tách biệt logic truy cập dữ liệu từ controllers
- Service Layer chứa business logic, giúp code dễ test và bảo trì
- Request Validation giúp tách biệt logic validation
- API Resources chuẩn hóa dữ liệu trả về
- Events & Listeners xử lý các tác vụ phụ không đồng bộ
