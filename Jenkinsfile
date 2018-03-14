pipeline {
  agent any
  stages {
    stage('error') {
      steps {
        sh '''composer install
./vendor/bin/phpunit
'''
      }
    }
  }
}