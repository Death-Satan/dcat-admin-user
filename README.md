# Dcat Admin Extension
## 非侵入式用户管理扩展
# 安装
```shell script
composer require death_satan/dcat-admin-user -vvv
# 发布配置资源
php artisan vendor:publish --tag=config --force
# 发布 翻译包资源
php artisan vendor:publish --tag=lang --force
```
## 配置config/user.php文件
- parent 父级模型类名 
### 模型类中定义grid,form,detail方法



