# logistic-demo-laravel


### Steps for auth implementation in laravel 6.0 ::

- requirement of php 7.2 or greater
- laravel 6.0
- run folloeing commands :
    - composer require laravel/ui --dev
    - php artisan ui vue --auth
    - npm install && npm run dev

### generate fake users data in Users table using seed ::
- change in database->seeds->DatabaseSeeder.php and run below command
- php artisan db:seed
- more info : https://laravel.com/docs/master/seeding


# bash_profile export :

- export ANDROID_HOME="/Users/digvijay/Library/Android/sdk"
- export PATH="$ANDROID_HOME/build-tools/29.0.2:$PATH"
- export PATH="$ANDROID_HOME/platform-tools:$PATH"
- export PATH="$ANDROID_HOME/platform-tools/adb:$PATH"
- export PATH="/Users/digvijay/.composer/vendor/bin:$PATH"
- export PATH="~/.composer/vendor/bin:$PATH"
- export PATH="/usr/bin:/bin:/usr/sbin:/sbin:$PATH"
- export PATH="/usr/local/bin:/usr/local/sbin:$PATH"
- export XAMPP_HOME="/Applications/XAMPP"
- export PATH="$XAMPP_HOME/bin:$PATH"