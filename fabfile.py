from fabric.api import *
import os

env.hosts = ['natebeaty.opalstack.com']
env.user = 'natebeaty'
env.path = '~/Sites/nb-craft3'
env.remotepath = '/home/natebeaty/apps/nb_craft3'
env.git_branch = 'master'
env.warn_only = True
env.forward_agent = True
env.php_binary = 'php74'

def assets():
  local('npx gulp --production')

def devsetup():
  print "Installing composer, node and bower assets...\n"
  local('composer install')
  local('npm install')
  local('cd assets && bower install')
  local('npx gulp')
  local('cp .env-example .env')
  print "OK DONE! Hello? Are you still awake?\nEdit your .env file with local credentials\nRun `npx gulp watch` to run local gulp to compile & watch assets"

def deploy(composer='y'):
  update()
  if composer == 'y':
    composer_install()
  clear_cache()

def update():
  with cd(env.remotepath):
    run('git pull origin {0}'.format(env.git_branch))

def composer_install():
  with cd(env.remotepath):
    run('%s ~/bin/composer.phar install' % env.php_binary)

def clear_cache():
  with cd(env.remotepath):
    run('./craft clear-caches/compiled-templates')
    run('./craft clear-caches/data')
