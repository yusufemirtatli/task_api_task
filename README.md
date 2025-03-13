**PROJEYİ AYAĞA KALDIRMAK İÇİN GEREKLİ OLAN KURULUMLAR**

`composer install`  composer için gerekli dosyaların kurulumu

`cp .env.example .env`  .env dosyasını oluşturur

`php artisan key:generate`  .env dosyanızdaki eksik yerleri doldurur

`npm install`  bu kod ile gerekli nodemodule dosyalarını kurabilirsiniz

`php artisan migrate`  migration dosyalarından databaseinizi oluşturur

`php artisan db:seed`  databasemizin içine önceden belirlenmiş verileri ekler

`php artisan serve`  projeyi ayağa kaldırır

**API ROUTE'LARIMINZ API.PHP NİN İÇİNDEDİR**

'/employees' bütün employee'lerimizi listeler
'/employees/{id}/tasks' verdiğimiz id'ye sahip olan employee'lerin tasklarını listeler
'/tasks' yeni task oluşturur
'/tasks/{id}' verilmiş id'ye sahip taskı güncellemeye yarar
'/tasks/{id}/complete' verilmiş id'ye sahip taskın statüsünü complete yapar

**POSTMAN COLLECTİON'I DOSYALARIN İÇİNDEDİR**
