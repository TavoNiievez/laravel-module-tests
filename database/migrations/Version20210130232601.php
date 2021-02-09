<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Builder;
use LaravelDoctrine\Migrations\Schema\Table;

class Version20210130232601 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $builder = new Builder($schema);
        $builder->create('users', function (Table $table) {
            $table->increments('id');
            $table->index('id');
            $table->string('name');
            $table->string('email');
            $table->unique('email');
            $table->timestamp('email_verified_at')->setNotnull(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->setNotnull(false);
            $table->timestamp('updated_at')->setNotnull(false);
        });
    }

    public function down(Schema $schema): void
    {
        $builder = new Builder($schema);
        $builder->dropIfExists('users');
    }
}
