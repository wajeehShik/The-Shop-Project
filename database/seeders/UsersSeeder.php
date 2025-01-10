<?php
namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private $numbersPhone=[];
    private function checkNumberExists($number){
        if(!in_array($number,$this->numbersPhone)){
$numbersPhone[]=$number;
return true;
        }
        return false;
    }
    public function generatePhone(){
      $number='059'.(string)rand(0,9).(string)rand(0,9).(string)rand(0,9).(string)rand(0,9).(string)rand(0,9).(string)rand(0,9).(string)rand(0,9);

      if($this->checkNumberExists($number)){
        return $number;
      }else{
$this->generatePhone();
      }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$faker = Factory::create();
        $users  = [];
    $count=0;
        for ($i = 0; $i <1000; $i++) {
            $users [] = [
                'name'         =>$faker->name,
                'email'=>$i.$faker->email.(string)rand(0,20),
                'email_verified_at'=>now(),
                'password'=>bcrypt('123123123'),
                'status'=>(string)rand(0,1),
                'online'=>(string)rand(0,1),
                'phone'   =>$this->generatePhone(),
            ];
            
        }  $chunks = array_chunk($users , 500);
        foreach ($chunks as $chunk) {
            User::insert($chunk);
        }
    }
}
