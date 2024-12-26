# Technologies

## Laravel framework
### Laravel basic:
#### 1. Routing trong Laravel
Routing là gì?
Routing là quá trình khớp yêu cầu (request) đến một đoạn mã cụ thể trong ứng dụng. Laravel cung cấp một hệ thống routing đơn giản và mạnh mẽ, cho phép bạn xác định cách ứng dụng phản hồi các yêu cầu khác nhau.

Cách định nghĩa route trong Laravel:
Class Route: Dùng để khai báo các route.
Phương thức GET: Được sử dụng để xử lý các yêu cầu HTTP GET.
Ví dụ:
```
Route::get('/', function () {  
    return "Hello World";  
});  
Đoạn mã trên định nghĩa một route tại URL / và trả về chuỗi "Hello World".
```
Cấu trúc thư mục Routes:
Laravel lưu các route trong thư mục routes. Các file trong thư mục này được load tự động bởi Route Service Provider.
web.php: Chứa các route dành cho giao diện web và được gắn với middleware web. Middleware này cung cấp các tính năng như session state và CSRF protection.
api.php: Chứa các route cho API. Các route này không có trạng thái và được gắn với middleware API.
API routes hoạt động như data provider và có thể dùng thêm các middleware khác, bao gồm authorization và authentication.
Ví dụ về route API:
```
Route::get('/user', function () {  
    return "User will be loaded";  
});
```
Chạy server bằng Artisan:
Dùng lệnh php artisan serve để khởi chạy server. Mặc định, server sẽ chạy ở cổng 8000.

#### 2. Controllers và Views:
Trả về View trong Route:
Laravel cho phép trả về một file HTML thông qua view function.
Thư mục chứa các view: resources/views.
Tên file view: Sử dụng Blade Template Engine, ví dụ user.blade.php.
Ví dụ:
```
Route::get('/user', function () {  
    return view('user');  
});
```
Nội dung file user.blade.php:
```
<!DOCTYPE html>  
<html>  
<body>  
    <h1>User is loaded</h1>  
</body>  
</html>  
Khi truy cập route /user, nội dung file sẽ được hiển thị.
Có thể sử dụng các thẻ HTML như <h1> để hiển thị tiêu đề và các tính năng khác của HTML.
```


##### 2.1. Controllers:
Giới thiệu về Controllers và Views:
Controllers và Views là hai thành phần quan trọng trong Laravel.
Controllers: Chịu trách nhiệm xử lý các yêu cầu HTTP đến và trả về phản hồi. Controller có thể truy xuất dữ liệu từ database hoặc xác thực dữ liệu đầu vào.
Views: Chịu trách nhiệm tạo HTML hiển thị cho người dùng.
Mối liên kết: Controllers và Views phối hợp xử lý yêu cầu và hiển thị nội dung HTML.

Các mẹo khi làm việc với Controllers và Views:
Dependency Injection: Tiêm phụ thuộc vào Controller để viết mã dễ kiểm thử và tái sử dụng.
View Composers: Truyền dữ liệu cần thiết vào nhiều Views.
Blade Templates: Dùng để tạo HTML động với cú pháp đơn giản và mạnh mẽ.
Document Controllers và Views: Giúp duy trì và hiểu mã dễ dàng hơn.

Cấu trúc và chức năng của Controller:
Controllers thường là các lớp PHP chứa các phương thức xử lý từng loại yêu cầu HTTP cụ thể như GET hay POST.
Ví dụ:
Route ``` /user ``` gọi Controller xử lý và trả dữ liệu.
Tham số có thể được truyền qua route, ví dụ: ``` /user/{id} ```.

Tạo Controller bằng Artisan:
Dùng lệnh: ```php artisan make:controller UserController``` để tạo Controller.
Controllers được lưu trong thư mục app/Http/Controllers.
Logic được phân tách: Mã xử lý ở Controller tách biệt khỏi file định nghĩa route.

Code mẫu trong Controller:
Tạo hàm ```getUser($id)``` để tìm user từ database và trả về một View cụ thể.
Dùng Model để truy cập database: ```$user = User::find($id);```.
Trả dữ liệu đến View: ```return view('user.profile', ['user' => $user]);```.

Mapping Route với Controller:
Import Controller và sử dụng cú pháp:
```
Route::get('/user/{id}', [UserController::class, 'getUser']);
```
Đảm bảo phương thức và đường dẫn đã khai báo chính xác.

Xử lý lỗi và giải quyết vấn đề:
Lỗi thiếu import: Phải import Model ```User``` và các lớp cần thiết.
Lỗi dữ liệu null: Khi dữ liệu không có trong database, cần kiểm tra và seed dữ liệu.

Migration và Seeding Database:
Migration:
Tạo bảng bằng lệnh: ```php artisan migrate```.
Laravel tự tạo bảng mặc định như ```users```, passwords.
Seeding:
Dùng lệnh: ```php artisan db:seed``` để thêm dữ liệu mẫu vào bảng.
Seeder file có thể tạo và tuỳ chỉnh trong database/seeders.

Chạy và kiểm tra ứng dụng:
Sau khi migration và seeding thành công, Controller lấy dữ liệu từ database và truyền đến View.
View hiển thị dữ liệu trên giao diện HTML.


##### 2.2. Views:

Khái niệm về Views:
Views là các Blade templates được sử dụng để tạo HTML hiển thị cho người dùng.
Blade là công cụ đơn giản, mạnh mẽ giúp tạo các trang web động.

Sử dụng Views trong Laravel:
Để sử dụng View, bạn cần trả về nó từ phương thức trong Controller.
```
return view('user.profile', ['user' => $user]);
```
Tham số đầu tiên (```user.profile```): Đường dẫn đến file View trong thư mục ```resources/views/user/profile.blade.php```.
Tham số thứ hai: Mảng dữ liệu truyền vào View, ở đây là biến ```user```.

Cấu trúc thư mục của Views:
Views nằm trong thư mục resources/views.
Ví dụ:
Thư mục: ```resources/views/user/```.
File: ```profile.blade.php```.

Kết nối giữa Controller và View:
Controller: Truy xuất dữ liệu từ database và truyền vào View.
View: Nhận dữ liệu và hiển thị nội dung.
Laravel tự động ánh xạ biến dữ liệu trong Controller vào View, ví dụ: Biến ```user``` được truyền và truy cập như một biến trong Blade.

Ví dụ thực tế:
View ```profile.blade.php``` hiển thị tên người dùng được truy vấn từ database.
Có thể chỉnh sửa View để thêm thẻ HTML như ```<h1>``` để nội dung hiển thị nổi bật hơn.

#### 3. Database Migrations và Eloquent ORM trong Laravel:
Giới thiệu về Database Migrations và Eloquent ORM:
Migrations: Dùng để quản lý schema của database, giúp tạo và sửa đổi bảng một cách dễ dàng, có thể được seed dữ liệu mẫu.
Eloquent ORM: Công cụ của Laravel giúp tương tác với database bằng mô hình hướng đối tượng, thông qua các Model tương ứng với bảng trong database.
Chi tiết về Migrations:
Cách tạo Migrations:
Sử dụng Artisan command:
bash
```
php artisan make:migration create_users_table
```
File migration sẽ được lưu trong thư mục database/migrations.
Cấu trúc file Migration:
Gồm 2 phương thức:
up(): Định nghĩa thay đổi schema (tạo bảng, thêm cột,...).
down(): Định nghĩa cách hủy thay đổi (xóa bảng, xóa cột,...).
Chạy Migration:
Sử dụng Artisan command:
bash
```
php artisan migrate
```
Chạy tất cả các migration chưa được thực thi.
Ví dụ: Tạo bảng users với các cột như name, email (unique), email_verified_at (nullable).
Seeder và Factory:
Seeder: Dùng để seed dữ liệu mẫu vào database.
File Seeder được lưu trong thư mục database/seeders.
Ví dụ:
php
```
php artisan make:seeder UsersTableSeeder
```
Factory: Tạo dữ liệu mẫu với các giá trị ngẫu nhiên.
Ví dụ: Tạo 10 user ngẫu nhiên với Factory.
php
Sao chép mã
User::factory()->count(10)->create();
Chi tiết về Eloquent ORM:
Model:
File Model đại diện cho bảng database, lưu trong thư mục app/Models.
Ví dụ: Model User đại diện cho bảng users.
Có thể khai báo các thuộc tính như:
$fillable: Các cột được phép gán giá trị.
$hidden: Các cột không hiển thị trong kết quả JSON.
Eloquent Relationships: Dùng để mô tả quan hệ giữa các bảng (1-1, 1-n, n-n).
Scopes: Định nghĩa các hàm filter, sort dữ liệu trong Model để tái sử dụng.
Lưu ý khi sử dụng Migrations và Eloquent:
Sử dụng tên file migration mô tả rõ chức năng.
Đặt tên Model và bảng tương tự nhau để dễ quản lý.
Document rõ ràng các file migration và model.
Luôn kiểm tra lại trước khi thực thi migration trên môi trường sản xuất.

### MVC

### MySQL/SQL/postgresSQL/no-sql Database (Firebase, Mongo DB)

### Programming Language



## PHP (OOP)

### PHP tags
```
<?php
  // Code block
?>
```
### Outputtinng 
```
echo
print
```
### Comments
```
single-line: \\
multiline: /* */
```
### Variables
```
$name = "Minh";
$age = 19;
```
### Functions
```
<?php
  fountion greet($name){
    echo "Hello, $name";
    greet("Minh");
?>

Output--> Hello, Minh
```
1
