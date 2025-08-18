<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * الحقول القابلة للتعبئة (Mass Assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role', // admin, user, etc.
    ];

    /**
     * الحقول التي يجب إخفاؤها عند التحويل إلى JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * الحقول الظاهرة عند التحويل إلى JSON.
     *
     * @var array<int, string>
     */
    protected $visible = [
        'id',
        'name',
        'email',
        'phone',
        'role',
        'created_at',
        'updated_at',
    ];

    /**
     * التحويلات التلقائية لأنواع الحقول.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * العلاقة مع سلة التسوق (Cart).
     */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * العلاقة مع الطلبات (Order).
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * التحقق مما إذا كان المستخدم مديراً.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * التحقق مما إذا كان المستخدم عادياً.
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * عدد الطلبات التي قام بها المستخدم (للاستخدام في الإحصائيات).
     */
    public function ordersCount(): int
    {
        return $this->orders()->count();
    }

    /**
     * إجمالي الإنفاق للمستخدم (للاستخدام في الإحصائيات).
     */
    public function totalSpent(): float
    {
        return $this->orders()->sum('total');
    }

    /**
     * نطاق الاستعلام للمستخدمين النشطين (الذين لديهم طلبات).
     */
    public function scopeActive($query)
    {
        return $query->has('orders', '>', 0);
    }

    /**
     * نطاق الاستعلام للمستخدمين حسب الدور.
     */
    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }
}