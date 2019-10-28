<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Laravel 6.x Blog
基于Laravel 6.x 版本开发的最简单的博客网站，给新手或打算学习Laravel框架的小伙伴一个借鉴作用。

此博客理论上跟版本没有太大的影响，因为用的都是最基础的功能。

## 安装
下载本项目代码到本地：
```
git clone https://github.com/lanceWan/v6blog.git
```

进入到项目然后 `composer` 安装：

```
cd v6blog

composer install
```
> 如果安装缓慢，推荐式样中国镜像：[阿里云 Composer 全量镜像](https://developer.aliyun.com/composer?spm=5176.12825654.h2v3icoap.795.e9392c4a4QxFCB&aly_as=4lKC45sg)

配置 `.env` 文件：
```
[sudo]cp .env.example .env
```

> Linux 和 Mac 下注意执行权限 !

配置数据库：
```
DB_HOST=localhost
DB_DATABASE=homestead   # 数据库名称
DB_USERNAME=homestead   # 数据库用户名
DB_PASSWORD=secret      # 数据库密码
```

迁移数据：
```
php artisan migrate --seed
```

OK,项目已经配置完成，直接访问首页然后登录即可，不清楚路由的可以直接去看 `routes/web.php` 文件。默认管理员账号：`iwanli` , 密码：`123123` 。如果你是在 `Linux` 或 `Mac` 下配置的请注意相关目录的权限，这里我就不多说了，enjoy！


## 建议和反馈
`Laravel 6.x Blog` 发展离不开大家的反馈和建议，如果大家有什么想法可以直接在 [https://github.com/lanceWan/v6blog/issues](https://github.com/lanceWan/v6blog/issues) 中提出，谢谢。

Laravel学习交流群：`312621686`


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
