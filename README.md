# queue 配置


## ENV 
- QUEUE_CONNECTION=database

## 指令
- php artisan queue:table

有可能會漏掉fail job的table
- php artisan queue:failed_table

產event
- php artisan make:event TestEvent

產listener
- php artisan make:listener Test01Listen

綁定事件與監聽器
- EventServiceProvider.php 

```php
    protected $listen = [
        TestEvent::class =>[
            Test01Listen::class,
        ]
    ];
```

## 執行
```php
TestEvent::dispatch($data);
```

## 更新queue 排成
```
php artisan queue:restart
```

## supervisor 相關可能用上的指令
```
//檢查是否運作
service supervisor status

//停止
service supervisor stop

//關閉
service supervisor start

//進入supervisorctl 的命令列模式
supervisorctl

//檢查進程狀況
supervisorctl status

```

## 相關位置與檔案

這兩個檔案是可以直接啟動的
- 進入命令列 : /usr/bin/supervisorctl
- 重啟 : /usr/bin/supervisord

log位置
- /var/log/supervisor/supervisord.log
- /var/www/html/worker.log

config 位置:
- /etc/supervisor/supervisord.conf
- /etc/supervisor/conf.d/supervisord.conf


## 使listen使用queue
```php
class Test01Listen implements ShouldQueue
```


## 參考
- [laravel-廣播系統](https://learnku.com/docs/laravel/9.x/broadcasting/12223)

- [laravel-事件系統](https://learnku.com/docs/laravel/9.x/events/12228)

- [laravel-隊列](https://learnku.com/docs/laravel/9.x/queues/12236)

- [laravel 配置 supervisor](https://laravel.com/docs/7.x/queues#supervisor-configuration)

- [supervisor 教學](https://hoohoo.top/blog/supervisor-instructions-for-use/)

- [docker 安裝 supervisor](https://philipzheng.gitbook.io/docker_practice/cases/supervisor)

- [Supervisor sock file missing](https://serverfault.com/questions/808732/supervisor-sock-file-missing)

- [supervisor 在docker自動啟動的問題](https://stackoverflow.com/questions/63608075/userwarning-supervisord-is-running-as-root-and-it-is-searching-for-its-configur)

- [Supervisor and Docker](https://advancedweb.hu/supervisor-with-docker-lessons-learned)

- [[Linux] Supervisor的使用](https://www.huweihuang.com/article/linux/supervisor-usage/)

- [ Laravel php_fpm plus nginx plus supervisor Docker setup](https://gist.github.com/BretFisher/54ff7c4cae294c39f1afea4786efd321)