<?php

namespace App\Providers;

use App\Services\Interfaces\AdvertisingInterface;
use App\Services\Interfaces\PermissionInterface;
use App\Services\Interfaces\PlatformInterface;
use App\Services\Interfaces\ReportInterface;
use App\Services\Interfaces\RoleInterface;
use App\Services\Interfaces\UserInterface;
use App\Services\Repositories\AdvertisingRepository;
use App\Services\Repositories\PermissionRepository;
use App\Services\Repositories\PlatformRepository;
use App\Services\Repositories\ReportRepository;
use App\Services\Repositories\RoleRepository;
use App\Services\Repositories\UserRepository;

class RepositoryPatternProvider
{
    /**
     * Register Repository dependency injection
     *
     * @return void
     */
    public static function register(): void
    {
        // burada İnterface ile repository eşliyoruz
        app()->bind(UserInterface::class, UserRepository::class);
        app()->bind(RoleInterface::class, RoleRepository::class);
        app()->bind(PermissionInterface::class, PermissionRepository::class);
        app()->bind(AdvertisingInterface::class, AdvertisingRepository::class);
        app()->bind(PlatformInterface::class, PlatformRepository::class);
        app()->bind(ReportInterface::class,ReportRepository::class);
    }
}
