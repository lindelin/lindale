pipeline {
  agent any
  stages {
    stage('Install') {
      steps {
        sh '''sudo cp .env.travis .env
sudo composer self-update
sudo composer install --no-interaction --prefer-dist --no-suggest
sudo php artisan key:generate'''
      }
    }
  }
}