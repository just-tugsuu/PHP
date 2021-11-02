## 🚀 Ubuntu

### Redis суулгах 

```
$ curl https://packages.redis.io/gpg | sudo apt-key add -
$ echo "deb https://packages.redis.io/deb $(lsb_release -cs) main" | sudo tee /etc/apt/sources.list.d/redis.list
$ sudo apt-get update
$ sudo apt-get install redis
```

>extension суулгахаас өмнө phpize package хэрэг болох бөгөөд энэ нь build хийх орчинг бэлдэж өгөхөд ашиглагдана.  


### PHP redis extension холболт


Эхэлж php redis extension суулгах ба source кодноос нь build хийх болно  

```
git clone https://github.com/phpredis/phpredis.git
cd phpredis
phpize && ./configure && make && sudo make install
```

extension-г build хийгдсэний дараа modules folder үүсгэгдэх болно.

```
─ modules
   └── redis.so
```

Одоо php тэй холбохын тулд modules доторх `redis.so` файлыг xampp-ын extension_dir фолдорт оруулж өгөх хэрэгтэй. 

```
sudo cp -i /home/Username/phpredis/modules/redis.so /opt/lampp/lib/php/extensions/no-debug-non-zts-20190902
```
`extension_dir` - фолдерийн байршлыг xampp - ийн localhost дээрх phpInfo() дээрээс харах боломжтой. 

`redis.so` файлыг copy paste хийсэний дараа идэвхжүүлэх хэрэгтэй бөгөөд `php.ini` тохиргооны файлын extension хэсэгт дараах мөрийг нэмэх болно.

```
extension = redis.so
``` 

амжилттай идвэхжсэн тохиолдолд phpinfo() дотор redis extension-ны модиулууд харагдах болно. 💀