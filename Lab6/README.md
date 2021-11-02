## 🚀 Ubuntu

### Redis суулгах 

```
$ curl https://packages.redis.io/gpg | sudo apt-key add -
$ echo "deb https://packages.redis.io/deb $(lsb_release -cs) main" | sudo tee /etc/apt/sources.list.d/redis.list
$ sudo apt-get update
$ sudo apt-get install redis
```

### PHP redis extension холболт


Эхэлж php redis extension суулгах ба source кодноос нь build хийх болно  

```
git clone https://github.com/phpredis/phpredis.git
cd phpredis
phpize && ./configure && make && sudo make install
```

extension build хийгдсэний дараа modules folder үүсгэгдэх болно.

```
─ modules
   └── redis.so
```

Одоо php тэй холбохын тулд modules доторх `redis.so` файлыг xampp-ын extension_dir фолдорт оруулж өгөх хэрэгтэй. 

```
sudo cp -i /home/Username/phpredis/modules/redis.so /opt/lampp/lib/php/extensions/no-debug-non-zts-20190902
```
`extension_dir` - фолдерийн байршилыг xampp - ийн localhost дээрх phpInfo() дээрээс харах боломжтой. 

`redis.so` файлыг зөөсөны дараа идвэхжүүлэх хэрэгтэй бөгөөд `php.ini` тохиргооны файлд мөр кодыг нэмэх болно.

```
extension = redis.so
``` 

