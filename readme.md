
## Website Quản Lý Bán Giày
Với xu hướng hình thức kinh doanh qua mạng hiện nay ngày càng trở lên phổ biến. Hình thức kinh doanh này mang lại rất nhiều lợi ích cho người tiêu dùng cũng như nhà cung cấp
Nắm bắt được vấn đề đó chúng tôi đã xây dựng 1 website cho phép bán giày dép qua internet. 
Website được xây dựng chính bằng ngôn ngữ PHP sử dùng framework Laravel version 5.8

## Yêu cầu hệ thống

Để cài đặt Laravel 5.8 cần 1 số yêu cầu:

- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

Laravel thuộc sở hữu của [Composer](https://getcomposer.org/). Vì vậy trước khi cài laravel cần cài Composer trên máy tính trước 

## Mô hình MVC trong Laravel

**Model** : Chịu trách nhiệm quản lý dữ liệu, nó lưu trữ và truy xuất các thực thể từ cơ sở dữ liệu như mysql, sql server, postresSQL,… đồng thời chưa các logic được thực thi bởi ứng dụng
**View** : Chịu trách nhiệm hiển thị dữ liệu đã được truy xuất từ model theo một format nào đó theo ý đồ của lập trình viên. Cách sử dụng của View tương tự như các module templates thường thấy trong các ứng dụng web phổ biến như WordPress, Joomla,…
**Controller** : Trung gian, làm nhiệm vụ xử lý cho model và view tương tác với nhau. Controller nhận request từ client, sau đó gọi các model để thực hiện các hoạt động được yêu cầu và gửi ra ngoài View. View sẽ chịu trách nhiệm format lại data từ controller gửi ra và trình bày dữ liệu theo 1 định dạng đầu ra (html).

Cách thức hoạt động MVC trong Laravel như hình:



`User tạo ra một yêu cầu với URL dựa trên ứng dụng.
Xác định “route” tương ứng với URL của user, chuyển tới controller tương ứng.
Controller xử lý nghiệp vụ, nếu cần thiết thì truy vấn dữ liệu từ model và trả thông tin cho View
View cung cấp thông tin trả về cho user`


Vị trí:
- Model: Sẽ được tìm thấy ở thư mục App/[Tên_Model]
- View:  Sẽ được tìm thấy ở thư mục resources/views/[Tên_View]
- Controller:  Sẽ được tìm thấy ở thư mục App/Htpp/Controllers/[Tên_Controller]
- Router: Sẽ được tìm thấy ở thư mục Routes/web.php

## Cách thức clone project về máy

Mở terminal tại máy tính của bạn chạy lệnh <br>
```
git clone https://github.com/NamLuu199/NhomQLBanGiay.git
```


## Screenshoot


## Liên hệ 

Họ tên: Lưu Quang Nam<br>
Email: namlq.mhy@gmail.com<br>
SĐT: [032.787.4432](tel:0327874432)


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirAbout Laravelschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
