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

Server-side validation
Data validation on server side is specific to programing language.
For example, for NodeJS Joi library is very popular.
It allow to describe data which you desire and check input data if it fits into requirements.
The first thing we do is import it and then we set up some rules, like so:
const Joi = require('joi')

const schema = Joi.object().keys({ 
  name: Joi.string().alphanum().min(3).max(30).required(),
  year: Joi.number().integer().min(1970).max(2023), 
}); 

const dataToValidate = { 
  name 'chris', 
  birthyear: 1971 
} 

const result = Joi.validate(dataToValidate, schema)
What we are looking at above is us doing the following:
constructing a schema, our call to Joi.object(),
validating our data, our call to Joi.validate() with dataToValidate and schema as input parameters
Joi supports all sorts of primitives as well as Regex and can be nested to any depth.
string, this says it needs to be of type string, and we use it like so Joi.string()
number, Joi.number() and also supporting helper operations such as min() and max(), like so Joi.number().min(1).max(10)
required, we can say whether a property is required with the help of the method required, like so Joi.string().required()
any, this means it could be any type, usually we tend to use it with the helper allow() that specifies what it can contain, like so, Joi.any().allow('a')
optional, this is strictly speaking not a type but has an interesting effect. If you specify for example prop : Joi.string().optional. If we don’t provide prop then everybody’s happy.
array, we can check wether the property is an array of say strings, then it would look like this Joi.array().items(Joi.string().valid('a', 'b')
regex, it supports pattern matching with RegEx as well like so Joi.string().regex(/^[a-zA-Z0-9]{3,30}$/)

Browser libraries security
Modern web development is not possible without the use of third-party libraries. Many of them are stored on the developer’s CDN. But all this can lead to potential security risks.
We could setup famous lodash library very simple:
<script src="https://cdn.jsdelivr.net/npm/lodash/lodash.min.js"></script>
But this is not a safe way, since we do not control the file on a third-party server. We even do not know exact library version.
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
We could specify the specific version, it is a bit safer. We can also download this file to our project and connect it from the application directory, but this is not always justified.
But modern browsers have an ability to use CDNs in safe way.
integrity attribute
The integrity attribute contains inline metadata that a user agent can use to verify that a fetched resource has been delivered free of unexpected manipulation. You could use the integrity feature by specifying a base64-encoded cryptographic hash of a resource (file) you’re telling the browser to fetch, in the value of the integrity attribute of any <script> or <link> element.
<script
  src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"
  integrity="sha256-qXBd/EfAdjOA2FGrGAG+b3YBn2tn5A6bhz+LSgYD96k="
></script>
If browser detect that loaded content is not matched specified hash - script will not be included. The same will be for css files loaded via <link> tag.
crossorigin attribute
Normal script elements pass minimal information to the window.onerror for scripts which do not pass the standard CORS checks. To allow error logging for sites which use a separate domain for static media, use this attribute.
It could a few possible values but we are interested in crossorigin="anonymous". When it will be specified, request will use CORS headers and credentials flag is set to 'same-origin’. There is no exchange of user credentials via cookies, client-side SSL certificates or HTTP authentication, unless destination is the same origin.
Whole example for include a script from CDN is:
<script
  src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"
  integrity="sha256-qXBd/EfAdjOA2FGrGAG+b3YBn2tn5A6bhz+LSgYD96k="
  crossorigin="anonymous">
</script>

## NodeJS libraries security
NodeJs libraries will have the same problem with versions.
In package.json you will see something like this after adding new package via command npm i --save lodash.
{
  "dependencies": {
    "lodash": "^4.17.21"
  }
}
You could see ^ here - it mean, that 4.17.21 will be installed or any newest version.
What’s wrong with this approach:
Different developers may have different versions of dependencies;
We can install an elevated version of a dependency without our will.
We have not tested new versions of the library for performance and compatibility
The new version of the library may be compromised or have a vulnerability
If you specify exact version "lodash": "4.17.21" - it will not fully help to resolve a problem because used library could have dependencies too.
To avoid this, version 5 of npm introduced the ability to commit dependencies. To do this, in a special package-lock.json file, those packages that need to be installed strictly in the specified versions are listed. This excludes a version update without the knowledge of the developer.
This file contains information about package location and integrity checksum like integrity attribyte of <script> tag.
{
  "name": "name",
  "lockfileVersion": 2,
  "requires": true,
  "packages": {
    "": {
      "dependencies": {
        "lodash": "^4.17.21"
      }
    },
    "node_modules/lodash": {
      "version": "4.17.21",
      "resolved": "https://registry.npmjs.org/lodash/-/lodash-4.17.21.tgz",
      "integrity": "sha512-v2kDEe57lecTulaDIuNTPy3Ry4gLGJ6Z1O3vE1krgXZNrsQ+LFTGHVxVjcXPs17LhbZVGedAJv8XZ1tvj5FvSg=="
    }
  },
  "dependencies": {
    "lodash": {
      "version": "4.17.21",
      "resolved": "https://registry.npmjs.org/lodash/-/lodash-4.17.21.tgz",
      "integrity": "sha512-v2kDEe57lecTulaDIuNTPy3Ry4gLGJ6Z1O3vE1krgXZNrsQ+LFTGHVxVjcXPs17LhbZVGedAJv8XZ1tvj5FvSg=="
    }
  }
}
With packages lock you will use specific tested version.

## Rate limiting
Rate limiting is a technique used to control the amount of incoming or outgoing traffic within a network. It puts a cap on how often someone can repeat an action within a certain timeframe – for instance, trying to log in to an account. Or limit request rates when a user puts tequila on a button.
Rate limiting is often employed to stop bad bots from negatively impacting a website or application. Bot attacks that involve rate limiting can help mitigate things like:
Brute force attacks
DoS and DDoS attacks
Web scraping
Rate limiting runs within an application, rather than running on the web server itself. It could be based on several layers:
Users: the constraint is specific to a user and is implemented using a unique user identifier
Location: the constraint is based on geography and is implemented based on the location from which the request was made
IP addresses: the constraint is based on the IP address of the device that initiates a request
On the application level there are a lot of different libraries that can help with rate limiting which can be based on different limiting algorithms.
Token bucket: A token bucket maintains a rolling and accumulating budget of usage as a balance of tokens.
Leaky bucket: A leaky bucket is similar to a token bucket, but the rate is limited by the amount that can drip or leak out of the bucket.
Fixed window: Fixed-window limits—such as 3,000 requests per hour or 10 requests per day—are easy to state, but they are subject to spikes at the edges of the window, as available quota resets.
Sliding window: Sliding windows have the benefits of a fixed window, but the rolling window of time smooths out bursts.

## DoS and DDoS
A denial-of-service (DoS) attack is a type of cyber attack in which a malicious actor aims to render a computer or other device unavailable to its intended users by interrupting the device’s normal functioning. DoS attacks typically function by overwhelming or flooding a targeted machine with requests until normal traffic is unable to be processed, resulting in denial-of-service to addition users. A DoS attack is characterized by using a single computer to launch the attack.
A distributed denial-of-service (DDoS) attack is a malicious attempt to disrupt the normal traffic of a targeted server, service or network by overwhelming the target or its surrounding infrastructure with a flood of Internet traffic.
DDoS attacks achieve effectiveness by utilizing multiple compromised computer systems as sources of attack traffic.
DDOS Attack Classification
It is useful to group them as Infrastructure layer and Application Layer attacks.
Infrastructure Layer Attacks
Attacks at this layer, are typically categorized as Infrastructure layer attacks. These are also the most common type of DDoS attack and include vectors like synchronized floods and other reflection attacks like User Datagram Packet floods. These attacks are usually large in volume and aim to overload the capacity of the network or the application servers. But fortunately, these are also the type of attacks that have clear signatures and are easier to detect.
Application Layer Attacks
Attacks at this layer, are often categorized as Application layer attacks. While these attacks are less common, they also tend to be more sophisticated. These attacks are typically small in volume compared to the Infrastructure layer attacks but tend to focus on particular expensive parts of the application thereby making it unavailable for real users. For instance, a flood of HTTP requests to a login page, or an expensive search API, or even Wordpress XML-RPC floods.
Rate limiting could help from DoS attack in some cases but may be inefficient against DDoS because in most cases in runs on application level and required additional resources. This type of attacks mostly handled via special software - loadbalancers or special services.

DDoS Protection
Application Layer Attacks Protection
Modern loadbalancers and rate limiting on application level could prevent this type of attacks.
Using NGINX and NGINX Plus to Fight DDoS Attacks
Limiting the Rate of Requests
You can limit the rate at which NGINX and NGINX Plus accept incoming requests to a value typical for real users.
limit_req_zone $binary_remote_addr zone=one:10m rate=30r/m;

server {
    # ...
    location /login.html {
        limit_req zone=one;
    # ...
    }
}
The limit_req_zone directive configures a shared memory zone called one to store the state of requests for the specified key, in this case the client IP address ($binary_remote_addr). The limit_req directive in the location block for /login.html references the shared memory zone.
Limiting the Number of Connections
You can limit the number of connections that can be opened by a single client IP address, again to a value appropriate for real users. For example, you can allow each client IP address to open no more than 10 connections to the /store area of your website:
limit_conn_zone $binary_remote_addr zone=addr:10m;

server {
    # ...
    location /store/ {
        limit_conn addr 10;
        # ...
    }
}
The limit_conn_zone directive configures a shared memory zone called addr to store requests for the specified key, in this case (as in the previous example) the client IP address, $binary_remote_addr. The limit_conn directive in the location block for /store references the shared memory zone and sets a maximum of 10 connections from each client IP address.
Read whole documentation article.
Using haproxy
Other popular loadbalancer - haproxy - have the same abilities to protect applications on this level.
Read whole documentation article
Infrastructure Layer Attacks
It is more complicated type of attack and prevention is required specific knowledges about OS and network administration. But where is a lot of services which provide this kind of protection, like Cloudflare.
It offers protection on different layers:
Website DDoS Protection - Web Services (L7): unmetered and free in all Cloudflare website application service plans.
Application DDoS Protection - Spectrum (L4): reverse proxy, pay-as-you-go service for all TCP/UDP applications (gaming, VOIP, etc.).
Network DDoS Protection - Magic Transit (L3): for on-premise, cloud, & hybrid networks. Combine DDoS protection, traffic acceleration, & more.

### Password and Authentication

## Passwords storing
Password authentication looks simple at first - we store a pair of login and password data in the database and check for their equality when a user enters this information. However, security of the application will largely depend on how we saved the password.
The worst scenario occurs when the password is stored as it is - in plain text. If the storage location of such passwords is compromised (this can happen due to a huge number of reasons such as from human error or a bug in a third-party software) - the attacker doesn’t even have to do anything - he will immediately receive ready-made user passwords and can try to use them in various attacks. If the user used the same login and password combinations in financial or other applications, those accounts will be compromised as well.
IMPORTANT
You should never store passwords in plain text format.
The better thing that can be used to store passwords is its encrypted version. But this is not much safer than a plain text password - the encryption key can also be compromised and an attacker can decrypt them to their original form.
Hashing
A more secure way to store a password is to transform it into data that cannot be converted back to the original password. This mechanism is known as hashing.
Hashes are impossible to convert back into plain text, but you don’t need to convert them back in order to break them. Once you know that a certain string converts to a certain hash, you know that any instance of that hash represents that string.
Hashing a password is good because it is quick and it is easy to store. Instead of storing the user’s password as plain text, which is open for anyone to read, it is stored as a hash which is impossible for a human to read.
Unfortunately, hashing a password is not nearly enough. It does not take very much computational power to generate a table of hashes consisting of letters, numbers, and symbols. Once you have this table, you can then compare a hash to it to see if it matches anything. Keep repeating this process and you might be able to crack the password.
Salting
Hashing user passwords alone is not a good practice. Therefore, you need “something else” to mix with the password before you perform hashing. This “something else” is called a **"salt".
In cryptography, a salt is random data that is used as an additional input to a one-way function that hashes data such as a password or passphrase.
Example of salting:
pa$$w0rd     => SHA256 => 4b358ed84b7940619235a22328c584c7bc4508d4524e75231d6f450521d16a17
pa$$w0rdsalt => SHA256 => 377583559c70a5ed513d1d3b2ce9d1f8474d48f05caaca76288a4df48d35ddb9
After hashing with a salt, it is almost impossible for an attacker to crack the password using a rainbow table attack (a password hacking technique), since they must be created anew for each case. It might actually be easier for an attacker to try to crack each password by brute force versus trying to use the rainbow technique, that’s how much stronger salting does for passwords.
However, here lies another problem - just salting the password is not enough. If brute force can be used to crack a password, other techniques need to be implemented to make it harder or longer to crack the password.
No Need for Speed
Common hashing algorithms are not quite suitable here because they are too fast. A cryptographic hash function used for password hashing needs to be slow computational process because a rapidly computed algorithm could make brute-force attacks more easily successful, especially with the rapidly evolving power of modern hardware. One strategy of getting the hash calculation to compute slowly is to use a lot of internal iterations or by making the calculation memory intensive. A slow cryptographic hash function hampers that process but doesn’t bring it to a halt since the speed of the hash computation affects both well-intended and malicious users. It’s important to achieve a good balance of speed and usability for hashing functions.

## Password Hashing Algorithms
There are a number of modern hashing algorithms that have been specifically designed for securely storing passwords. This means that they should be slow (unlike algorithms such as MD5 and SHA-1, which were designed to be fast), and how slow they are can be configured by changing the work factor.
Argon2id
Argon2 is the winner of the 2015 Password Hashing Competition. There are three different versions of the algorithm, and the Argon2id variant should be used, as it provides a balanced approach to resisting both side-channel and GPU-based attacks.
Rather than a simple work factor like other algorithms, Argon2id has three different parameters that can be configured. Argon2id should use one of the following configuration settings as a base minimum which includes the minimum memory size (m), the minimum number of iterations (t) and the degree of parallelism (p).
m=37 MiB, t=1, p=1
m=15 MiB, t=2, p=1
Both of these configuration settings are equivalent in the defense they provide. The only difference is a trade off between CPU and RAM usage.
scrypt
scrypt is a password-based key derivation function created by Colin Percival. While new systems should consider Argon2id for password hashing, scrypt should be configured properly when used in legacy systems.
Like Argon2id, scrypt has three different parameters that can be configured. scrypt should use one of the following configuration settings as a base minimum which includes the minimum CPU/memory cost parameter (N), the blocksize (r) and the degree of parallelism (p).
N=2^16 (64 MiB), r=8 (1024 bytes), p=1
N=2^15 (32 MiB), r=8 (1024 bytes), p=2
N=2^14 (16 MiB), r=8 (1024 bytes), p=4
N=2^13 (8 MiB), r=8 (1024 bytes), p=8
N=2^12 (4 MiB), r=8 (1024 bytes), p=15
These configuration settings are equivalent in the defense they provide. The only difference is a trade off between CPU and RAM usage.
bcrypt
The bcrypt password hashing function should be the second choice for password storage if Argon2id is not available or PBKDF2 is required to achieve FIPS-140 compliance.
The work factor should be as large as verification server performance will allow, with a minimum of 10.
bcrypt has a maximum length input length of 72 bytes for most implementations. To protect against this issue, a maximum password length of 72 bytes (or less if the implementation in use has smaller limits) should be enforced when using bcrypt.

## Password Security
A key concern when using passwords for authentication is password strength. A “strong” password policy makes it difficult or even improbable for one to guess the password through either manual or automated means. The following characteristics define a strong password.
Password Length
Minimum password length - Current recommendation - passwords less then 8 characters are weak. A application must prohibit the use of such passwords.
Maximum password length should not be set too low, as it will prevent users from creating passphrases. A common maximum length is 64 characters due to limitations in certain hashing algorithms, it could be extended to 128 characters. But passwords more then 128 characters should be denied to prevent DoS.
Do not silently truncate passwords, they are should be denied and user should select proper password.
Password Characters
Allow usage of all characters including unicode and whitespace. There should be no password composition rules limiting the type of characters permitted. It even including language neutral characters such as spaces and Emojis.
Verify that “paste” functionality, browser password helpers, and external password managers are permitted.
Visualize and check against leaks
Applcation should include password strength meter to help users create a more complex password. zxcvbn library could be used here.
It allow to check:
estimate strength of a password
get a score for the password
extend existing dictionaries with your own
Pwned Passwords service could be used to check if password is not secure.
Additional security checks
Verify users can change their password. It means you should check if user permitted to do it: ask confirmation of old password, verify or notify via email.
Ensure credential rotation when a password leak occurs, or at the time of compromise identification.

### OAUTH

## OAuth 2.0
OAuth 2.0(Open Authorization) is a standard designed to allow a website or application to access resources hosted by other web applications on behalf of a user.
OAuth 2.0 is an authorization protocol and not an authentication protocol. It works by delegating user authentication to the service that hosts a user account and authorizing third-party applications to access that user account. OAuth 2 provides authorization flows for web and desktop applications, as well as mobile devices.
OAuth Roles
Resource Owner: The user or system that owns the protected resources and can grant access to them.
Client: The client is the application that wants to access the user’s account.
Authorization Server: This server receives requests from the Client for Access Tokens and issues them upon successful authentication and consent by the Resource Owner. The authorization server exposes two endpoints: the Authorization endpoint, which handles the interactive authentication and consent of the user, and the Token endpoint, which is involved in a machine to machine interaction.
Resource Server: The resource server hosts the protected user accounts.
OAuth Scopes
Scope is a mechanism in OAuth 2.0 to limit an application’s access to a user’s account. A application can request a specific set of scopes and this information will be shown on the consent screen and the access token issued to the application will be limited to the scopes granted.
Abstract Protocol Flow
.guides/img/abstract_flow
Common OAuth flow works as described on the diagram:
The client(application) ask for authorization to access resources from the resource owner.
If the user pproved the request - the application got an authorization grant.
The client requests an access token from the authorization server by authorization grant and client secret.
If application request is verified - it will receive the access token from the authorization server
With obtained access token application could request the resources from API.
If the access token is valid the resource server returns data to the client.
Application configuration
To implement OAuth flow you need to register application to obtain information for application configuration. In most services it is done by developer registration form in the next page we will do it for google api. For most cases you will need to pass:
Application website
Application Name
Application Callback URL
After registration you will receive client credentials: client identifier and client secret.
OAuth Grant Types
OAuth could works in different environments: web application, mobile devices, smart devices etc. To provide it OAuth 2.0 offers different types of grant types.
Most used types is:
Authorization Code: used with server-side Applications
Client Credentials: used with Applications that have API access
Device Code: used for devices that lack browsers or have input limitations

## OAuth 2.0 with Google API
Google APIs use the OAuth 2.0 protocol for authentication and authorization. Google supports common OAuth 2.0 scenarios such as those for web server, client-side, installed, and limited-input device applications.
As first step you need to get client credentials from Google API Console.
As first step you need to create an application. Project name could be something like My OAuth Application.
After project is created, you need to configure consent screen. Go to OAuth consent screen tab and select External checkbox. On the app registration screen you need to enter application name again, user email and add authorized domain(it should be codio.io) and developer contain information. Click save and continue button.
After consent screen configuration you need to create client credentials - go to Credentials tab and click CREATE CREDENTIALS button. In the dropdown list select OAuth client ID.
In the creation from select Application type: Web application and enter application name again.
By clicking buttons below you could obtain information about Authorized JavaScript origins and Authorized redirect URIs.
Show Authorized JavaScript origins

Show Authorized redirect URIss
After filling in form click “CREATE” button. Popup window will show OAuth client information: you need to store it - we will use it soon.

## OpenID Connect
OAuth vs. OpenID Connect
OAuth 2 is not an authentication protocol. Instead, it is an authorization protocol, allowing an application to ask a user if it can access an API on their behalf. It is a delegation protocol. But it is possible to build user authentication over OAuth 2. It could be done in two ways: custom request for fetch user information from api(email/name/etc) or by using standart: OpenID Connect.
OpenID Connect: OAuth + Identity
OpenID Connect (OIDC) is an identity layer built on top of the OAuth 2.0 framework. It allows third-party applications to verify the identity of the end-user and to obtain basic user profile information. OIDC uses JSON web tokens (JWTs), which you can obtain using flows conforming to the OAuth 2.0 specifications.
OpenID Connect in google apps
In the response from OAuth 2.0 flow you could see id_token fields - it is information about user identity - because we used scope openid and it support OpenID Connect specification.
An ID Token is a JWT (JSON Web Token), that is, a cryptographically signed Base64-encoded JSON object. We could decode it and verify by additional nodejs packages - jsonwebtoken and jwks-rsa.
Fetch user information in custom way
You also could fetch information about user from google api by using access token. You just need to send get request to https://openidconnect.googleapis.com/v1/userinfo url with Authorization: Bearer TOKEN header. You could check current api uris by using link: https://accounts.google.com/.well-known/openid-configuration

### MySQL/SQL/postgresSQL/no-sql Database (Firebase, Mongo DB)


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
