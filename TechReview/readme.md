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
```
User::factory()->count(10)->create();
```
Chi tiết về Eloquent ORM:
Model:
File Model đại diện cho bảng database, lưu trong thư mục app/Models.
Ví dụ: Model ```User``` đại diện cho bảng ```users```.
Có thể khai báo các thuộc tính như:
```$fillable```: Các cột được phép gán giá trị.
```$hidden```: Các cột không hiển thị trong kết quả JSON.
Eloquent Relationships: Dùng để mô tả quan hệ giữa các bảng (1-1, 1-n, n-n).
Scopes: Định nghĩa các hàm filter, sort dữ liệu trong Model để tái sử dụng.

Lưu ý khi sử dụng Migrations và Eloquent:
Sử dụng tên file migration mô tả rõ chức năng.
Đặt tên Model và bảng tương tự nhau để dễ quản lý.
Document rõ ràng các file migration và model.
Luôn kiểm tra lại trước khi thực thi migration trên môi trường sản xuất.

Creating cookies
After receiving an HTTP request, a server can send one or more Set-Cookie headers with the response. The browser usually stores the cookie and sends it with requests made to the same server inside a Cookie HTTP header. You can specify an expiration date or time period after which the cookie shouldn’t be sent. You can also set additional restrictions to a specific domain and path to limit where the cookie is sent. For details about the header attributes mentioned below, refer to the Set-Cookie reference article.
The Set-Cookie HTTP response header sends cookies from the server to the user agent. A simple cookie is set like this:
Set-Cookie: <cookie-name>=<cookie-value>
This instructs the server sending headers to tell the client to store a pair of cookies:
HTTP/2.0 200 OK
Content-Type: text/html
Set-Cookie: cookie_name=value
Set-Cookie: second_cookie_name=value2
[page content]

Then, with every subsequent request to the server, the browser sends all previously stored cookies back to the server using the Cookie header.
GET /page.html HTTP/2.0
Host: example.org
Cookie: cookie_name=value; second_cookie_name=value2

Cookies Security: Secure
The Secure cookie attribute instructs web browsers to only send the cookie through an encrypted HTTPS (SSL/TLS) connection. This session protection mechanism is mandatory to prevent the disclosure of the session ID through MitM (Man-in-the-Middle) attacks. It ensures that an attacker cannot simply capture the session ID from web browser traffic.
Forcing the web application to only use HTTPS for its communication (even when port TCP/80, HTTP, is closed in the web application host) does not protect against session ID disclosure if the Secure cookie has not been set - the web browser can be deceived to disclose the session ID over an unencrypted HTTP connection. The attacker can intercept and manipulate the victim user traffic and inject an HTTP unencrypted reference to the web application that will force the web browser to submit the session ID in the clear.
The Secure attribute is meant to protect against man-in-the-middle (MITM) attacks. However, it protects only the confidentiality of the cookie, not its integrity. In a MITM attack, an attacker located between the browser and the server will not receive the cookie from the server via an unencrypted connection but can still send a forged cookie to the server in plain text.
HTTP/2.0 200 OK
Content-Type: text/html
Set-Cookie: cookie_name=value; Secure

Cookies Security: HttpOnly
The HttpOnly cookie attribute instructs web browsers not to allow scripts (e.g. JavaScript or VBscript) an ability to access the cookies via the DOM document.cookie object. This session ID protection is mandatory to prevent session ID stealing through XSS attacks. However, if an XSS attack is combined with a CSRF attack, the requests sent to the web application will include the session cookie, as the browser always includes the cookies when sending requests. The HttpOnly cookie only protects the confidentiality of the cookie; the attacker cannot use it offline, outside of the context of an XSS attack.
While the HttpOnly attribute protects the confidentiality of sensitive cookies, it does not protect them from being overwritten. This is because a browser can only store a limited number of cookies for a domain. An attacker may use the cookie jar overflow attack to set a large number of cookies for a domain, deleting the original HttpOnly cookie from browser memory and allowing the attacker to set the same cookie without the flag.
HTTP/2.0 200 OK
Content-Type: text/html
Set-Cookie: cookie_name=value; HttpOnly

Cookies Security: SameSite
SameSite defines a cookie attribute preventing browsers from sending a SameSite flagged cookie with cross-site requests. The main goal is to mitigate the risk of cross-origin information leakage, and to provide some protection against cross-site request forgery attacks.
The SameSite cookie attribute may have one of the following values:
SameSite=Strict: The cookie is only sent if you are currently on the site that the cookie is set for. If you are on a different site and click a link to the site that the cookie is set for, the cookie is not sent with the first request.
SameSite=Lax: The cookie is not sent for embedded content, but it is sent if you trigger top-level navigation, e.g. by clicking on a link to the site that the cookie is set for. It is sent only with safe request types that do not change state, such as GET.
SameSite=None: The cookie is sent even for embedded content.
Note that you can expect different browser behaviors when the SameSite attribute is not set.
HTTP/2.0 200 OK
Content-Type: text/html
Set-Cookie: cookie_name=value; SameSite=Strict

Cookies Security: Expire and Max-Age
Session management mechanisms based on cookies can make use of two types of cookies, non-persistent (or session) cookies, and persistent cookies. If a cookie presents the Max-Age (that has preference over Expires) or Expires attributes, it will be considered a persistent cookie and will be stored on a device’s disk by the web browser until the expiration time.
Typically, session management capabilities to track users after authentication make use of non-persistent cookies. This forces the session to disappear from the client if the current web browser instance is closed. Therefore, it is highly recommended to use non-persistent cookies for session management purposes, so that the session ID does not remain on the web client cache for long periods of time, where an attacker can obtain it. Other recommendations include:
Ensure that sensitive information is not compromised by checking that a cookie is not persistent, encrypting it, and storing it only for the duration of the user’s need
Ensure that unauthorized activities cannot take place via cookie manipulation
Ensure that the Secure flag is set to prevent accidental transmission over the web in a non-secure manner
Determine if all state transitions in the application code properly check for cookies and enforce their use
Ensure entire cookie is encrypted if sensitive data is persisted in the cookie
Define all cookies being used by the application, their name, and why they are needed
HTTP/2.0 200 OK
Content-Type: text/html
Set-Cookie: cookie_name=value; Expires=Thu, 31 Oct 2021 07:28:00 GMT

SQL Injection Prevention
SQL Injection flaws are introduced when software developers create dynamic database queries constructed with string concatenation which includes user supplied input. Avoiding SQL injection flaws can be simple. For example, developers can either:
stop writing dynamic queries with string concatenation; and/or
prevent user supplied input which contains malicious SQL from affecting the logic of the executed query.
Other primary and additional defenses include:
Primary Defenses:
Option 1: Use of Prepared Statements (with Parameterized Queries)
Option 2: Use of Properly Constructed Stored Procedures
Option 3: Allow-list Input Validation
Option 4: Escape All User Supplied Input
Additional Defenses:
Option 5: Enforce Least Privilege
Option 6: Perform Allow-list Input Validation as a Secondary Defense
Unsafe Example:
SQL injection flaws typically look like this (example from a previous page):
conn.query('SELECT * FROM cats where age <= ' + age, (error, results, fields) => {})
The following (NodJS) example is UNSAFE, and would allow an attacker to inject code into the query that would be executed by the database. The unvalidated “age” parameter that is simply appended to the query allows an attacker to inject any SQL code they want. Unfortunately, this method for accessing databases is all too common.
Defense Option 1: Prepared Statements (with Parameterized Queries)
The use of prepared statements with variable binding (aka parameterized queries) is how all developers should first be taught how to write database queries. They are simple to write, and easier to understand than dynamic queries. Parameterized queries force the developer to first define all the SQL code, and then pass in each parameter to the query later. This coding style allows the database to distinguish between code and data, regardless of what user input is supplied.
Prepared statements ensure that an attacker is not able to change the intent of a query, even if SQL commands are inserted by an attacker. In the safe example below, if an attacker were to enter the age of tom' or '1'='1, the parameterized query would not be vulnerable and would instead look for a age which literally matched the entire string tom' or '1'='1.
Safe example for previous query will be:
conn.query('SELECT * FROM cats where age <= ?', [age], (error, results, fields) => {})
Library will be escape age variable and put it as the entire string and it will prevent the attack.
Defense Option 2: Stored Procedures
Stored procedures are not always safe from SQL injection. However, certain standard stored procedure programming constructs have the same effect as the use of parameterized queries when implemented safely which is the norm for most stored procedure languages.
‘Implemented safely’ means the stored procedure does not include any unsafe dynamic SQL generation. Developers do not usually generate dynamic SQL inside stored procedures. However, it can be done, but should be avoided.
Defense Option 3: Allow-list Input Validation
Various parts of SQL queries aren’t legal locations for the use of bind variables, such as the names of tables or columns, and the sort order indicator (ASC or DESC). In such situations, input validation or query redesign is the most appropriate defense. For the names of tables or columns, ideally those values come from the code, and not from user parameters.
For something simple like a sort order, it would be best if the user supplied input is converted to a boolean, and then that boolean is used to select the safe value to append to the query. This is a very standard need in dynamic query creation.
const query = "some SQL ... order by Salary " + (sortOrder ? "ASC" : "DESC");
Any time user input can be converted to a non-String, like a date, numeric, boolean, enumerated type, etc. before it is appended to a query, or used to select a value to append to the query, this ensures it is safe to do so
Defense Option 4: Escaping All User-Supplied Input
This technique should only be used as a last resort, when none of the above are feasible. Input validation is probably a better choice as this methodology is frail compared to other defenses and we cannot guarantee it will prevent all SQL Injection in all situations.
Additional Defenses (Option 5): Least Privilege
To minimize the potential damage of a successful SQL injection attack, you should minimize the privileges assigned to every database account in your environment. Do not assign DBA or admin type access rights to your application accounts. We understand that this is easy, and everything just ‘works’ when you do it this way, but it is very dangerous.
The designer of web applications should not only avoid using the same owner/admin account in the web applications to connect to the database. Different DB users could be used for different web applications.
Additional Defenses (Option 6): Allow-list Input Validation
In addition to being a primary defense when nothing else is possible (e.g., when a bind variable isn’t legal), input validation can also be a secondary defense used to detect unauthorized input before it is passed to the SQL query.

How to detect SQL injection
SQL Injection detection can depend on whether or not you have access to the specific code in question.
If you have access - you need to do a code audit and check if SQL Injection prevention techniques have been performed on the code.
If you do not have access - it can be detected manually by using a systematic set of tests against every entry point in the application.
Possible points to check:
Submitting the single quote character ' and looking for errors or other anomalies.
Submitting some SQL-specific syntax that evaluates to the base (original) value of the entry point, and to a different value, and then looking for systematic differences in the resulting application responses.
Submitting Boolean conditions such as OR 1=1 and OR 1=2, and looking for differences in the application’s responses.
Submitting payloads designed to trigger time delays when executed within an SQL query, and looking for differences in the time taken to respond.
Submitting OAST payloads designed to trigger an out-of-band network interaction when executed within an SQL query, and monitoring for any resulting interactions.
There are also a few free SQL Injection scanners that are available such as:
SQLMap
SQLMap is an automatic SQLi and database takeover tool available on GitHub. This open-source penetration testing tool automates the process of detecting and exploiting SQLi flaws or other attacks that take over database servers.
jSQL Injection
jSQL Injection is a Java-based tool that helps IT teams find database information from distant servers.
Havij
Havij was developed by an Iranian security company. It provides a graphical user interface (GUI) and is an automated SQLi tool, supporting several SQLi techniques. It has particular value in supporting penetration testers in finding vulnerabilities on web pages.

[page content]


[page content]

[page content]

[page content]


Client-side Validation
Before submitting data to a server, it is crucial to verify that all required form controls are filled out and formatted correctly. This process is known as client-side form validation and helps to ensure that submitted data aligns with the requirements specified in the various form controls. This article will guide you through the fundamental concepts and examples of client-side form validation.
Client-side validation serves as an initial check and is an essential aspect of a positive user experience. By catching invalid data on the client-side, users can promptly rectify any issues. If the server rejects the data, a noticeable delay occurs due to the round trip to the server and back to the client-side to inform the user of the necessary corrections.
What is Form Validation?
Visit any popular site with a registration form, and you will notice that they provide feedback when your data doesn’t meet the expected format. You will encounter messages like:
“This field is required” (You can’t leave this field blank).
“Please enter your phone number in the format xxx-xxxx” (A specific data format is required for it to be considered valid).
“Please enter a valid email address” (the data you entered is not in the right format).
“Your password needs to be between 8 and 30 characters long and contain one uppercase letter, one symbol, and a number” (A very specific data format is required for your data).
Form validation refers to the process wherein the browser and/or the web server checks that the entered data adheres to the correct format and complies with the constraints set by the application. Validation performed in the browser is known as client-side validation, while validation carried out on the server is referred to as server-side validation.
Different Types of Client-Side Validation
You will come across two primary types of client-side validation on the web:
Built-in form validation utilizes HTML form validation features, which have been discussed throughout various sections of this module. This type of validation typically requires minimal JavaScript and offers better performance than JavaScript validation. However, it is not as customizable as JavaScript validation.
JavaScript validation is developed using JavaScript code. This type of validation is fully customizable, but you need to create it from scratch or use a library.
Using Built-In Form Validation
One of the most notable features of modern form controls is their ability to validate most user data without relying on JavaScript. This is achieved by employing validation attributes on form elements, such as:
required: Specifies whether a form field needs to be completed before the form can be submitted.
minlength and maxlength: Specifies the minimum and maximum length of textual data (strings).
min and max: Specifies the minimum and maximum values of numerical input types.
type: Specifies the required data type, such as a number, an email address, or another specific preset type.
pattern: Specifies a regular expression that defines a pattern the entered data must adhere to.
Here is an example:
<form>
  <div>
    <label for="username">Username</label>
    <input id="username" name="username" type="text" required/>
  </div>
  <div>
    <label for="age">Age</label>
    <input id="age" name="age" type="number" required/>
  </div>
  <button>Submit</button>
</form>
Validating Forms Using JavaScript
To gain more control over the appearance and behavior of native error messages, you must employ JavaScript.
The Constraint Validation API provides the following properties on the above elements:
validationMessage: Returns a localized message describing the validation constraints that the control does not satisfy (if any). If the control is not a candidate for constraint validation (willValidate is false) or the element’s value meets its constraints (is valid), this property returns an empty string.
validity: Returns a ValidityState object containing various properties that describe the element’s validity state.
willValidate: Returns true if the element will be validated when the form is submitted; false otherwise.
The Constraint Validation API also makes the following methods available on the above elements and the form element:
checkValidity(): Returns true if the element’s value has no validity problems, false if otherwise. If the element is invalid, this method also fires an invalid event on the element.
reportValidity(): Reports invalid field(s) using events. This method is useful in combination with preventDefault() in an onSubmit event handler.
setCustomValidity(message): Adds a custom error message to the element; if you set a custom error message, the element is considered to be invalid, and the specified error is displayed. This allows you to use JavaScript code to establish a validation failure other than those offered by the standard HTML validation constraints.
Here is an example:
const email = document.getElementById("mail");
email.addEventListener("input", (event) => {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I am expecting an email address!");
    email.reportValidity();
  } else {
    email.setCustomValidity("");
  }
});
When working with frameworks like React, Angular, or Vue, it is advisable to research validation libraries tailored for the specific framework. These libraries can provide efficient and seamless validation, allowing you to maintain a consistent user experience and ensure accurate data collection.

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
