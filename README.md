<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Case Laravel Restapi Schema
* Laravel Resource
* Laravel Request
* Laravel Spatie Role & Permission
* Laravel Passport
* Laravel Services Repository Pattern 
* Laravel Rest Api Response
* Laravel Seed && Factory
* Error Handling Control
* Composer v2.5.8
* Swagger Api Document

###### Kurulum
- Docker ile kurulum için
- Terminalden proje dizinine gelip;
- docker-compose up -d
- docker exec -it api-app bash 
- composer install
- php artisan migrate && php artisan test && php artisan db:seed
- php artisan l5-swagger:generate
###### Normal kurulum
- Proje dizinide;
- composer install
- php artisan migrate && php artisan test && php artisan db:seed
- php artisan l5-swagger:generate



###### Not
 
 - localhost:8000/api ... api docker url 
 - localhost:8001 ... phpmyadmin -> giriş bilgileri 
 - `host= api.mysql`, `kullanıcı adı= user`, `şifre = root`
 - Proje rest api mimarisinde dizayn edilip, güncel kullanılan paketler ile basit kullanım ile geliştirilmiştir.
 - Seed işlemin de mok dataların işlenip hemde tablo ilişkileri kurulmuştur.
 - Calculate Helper ile datamapping yaparken php ile hesaplamalar eklenmiştir.
 - Resource methotların testleri yazılmıştır.
 - Postman collection projede paylaşılmıştır rapor endpointleri ile örnekleri inceleye bilirsiniz.
 - Swagger  url sonuna  /api/documentation ekleyerek UI açabilirsiniz. Örnek endpointleri inceleyebilirsiniz.
 - Örnek link: localhost:8000/api/documentation
 - Projede platform ve reklam ilişkisi bulunmaktadır, Platform transaction ları seed ile eklerken observe ile maliyeti platform daki bakiyeden düşürtüyorum, burada iki model birbirini dinliyor ve işlem yapıyor. Listining eventine örnek olsun diye böyle bir yaklaşımda bulundum.