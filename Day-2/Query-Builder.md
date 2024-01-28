# Query Builder

```php

use Illuminate\Support\Facades\DB;
 
// Multiple Rows 
$users = DB::table('users')->get();
 
foreach ($users as $user) {
    echo $user->name;
}

// Single Row
$user = DB::table('users')->where('name', 'John')->first();
 
return $user->email;

// Aggregates

$users = DB::table('users')->count();
 
$price = DB::table('orders')->max('price');

// Select
$users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
            
// Joins
$users = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();

// Where
$users = DB::table('users')
        ->where('votes', '=', 100)
        ->where('age', '>', 35)
        ->get();
        
$users = DB::table('users')->where('votes', 100)->get();

// OR where
$users = DB::table('users')
        ->where('votes', '>', 100)
        ->orWhere('name', 'John')
        ->get();

// Where Between
$users = DB::table('users')
           ->whereBetween('votes', [1, 100])
           ->get();
           
// WHERE IN
$users = DB::table('users')
        ->whereIn('id', [1, 2, 3])
        ->get();
                    
// Ordering
$users = DB::table('users')
        ->orderBy('name', 'desc')
        ->get();  

// Grouping
$users = DB::table('users')
        ->groupBy('account_id')
        ->having('account_id', '>', 100)
        ->get();

// Insert
DB::table('users')->insert([
    'email' => 'kayla@example.com',
    'votes' => 0
]);

// Auto-Incrementing IDs
$id = DB::table('users')->insertGetId(
    ['email' => 'john@example.com', 'votes' => 0]
);

// Update
$affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1]);
      
// Delete
$deleted = DB::table('users')->where('votes', '>', 100)->delete();                                     
```