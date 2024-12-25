# Technologies

## Laravel framework
### Laravel basic
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

#### 2. Controllers và Views
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
