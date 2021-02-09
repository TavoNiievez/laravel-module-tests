<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Builder;
use LaravelDoctrine\Migrations\Schema\Table;

class Version20210130233711 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $builder = new Builder($schema);
        $builder->create('password_resets', function (Table $table) {
            $table->string('email');
            $table->index('email');
            $table->string('token');
            $table->timestamp('created_at')->setNotnull(false);
        });
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('password_resets');
    }
}
