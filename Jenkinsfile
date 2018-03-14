pipeline {
  agent any
  stages {
    stage('Install') {
      steps {
        sh '''cp .env.travis .env
composer self-update
travis_retry composer install --no-interaction --prefer-dist --no-suggest
php artisan key:generate'''
      }
    }
  }
}