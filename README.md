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
```
