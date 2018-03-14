pipeline {
  agent any
  stages {
    stage('error') {
      steps {
        sh '''cd /var/www/html/lindale
./vendor/bin/phpunit
'''
      }
    }
  }
}