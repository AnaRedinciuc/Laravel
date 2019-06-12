<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titlu');
            $table->string('autor');
            $table->integer('userid');
            $table->date('readon');
            $table->timestamps();
        });

        DB::unprepared("CREATE PROCEDURE AddNewBook(in p_userid int, in p_titlu varchar(200), in p_autor varchar(200), 
        in p_readon date)
        BEGIN
        INSERT into Books(userID, titlu, autor, readon) VALUES (p_userID, p_titlu, p_autor, p_readon);
        END;");

        DB::unprepared("CREATE PROCEDURE DeleteBook(in p_bookID int)
        BEGIN
        DELETE FROM Books WHERE id=p_bookID;
        END;");

        DB::unprepared("CREATE PROCEDURE UpdateBook(in newtitle varchar(200), in newautor varchar(200), in p_readon date, in bookID int)
        BEGIN
        UPDATE Books
        SET titlu=newtitle, autor=newautor, readon=p_readon
        WHERE id=bookid;
        END;");

        DB::unprepared("CREATE TRIGGER Update_Book BEFORE UPDATE ON Books FOR EACH ROW
        BEGIN
            SET New.titlu = CONCAT(UCASE(LEFT(New.titlu, 1)),
                SUBSTRING(New.titlu, 2));
            SET New.autor = CONCAT(UCASE(LEFT(New.autor, 1)),
                SUBSTRING(New.autor, 2));
         END;");

        DB::unprepared("CREATE TRIGGER Insert_Book BEFORE INSERT ON Books FOR EACH ROW
        BEGIN
            SET New.titlu = CONCAT(UCASE(LEFT(New.titlu, 1)),
                SUBSTRING(New.titlu, 2));
            SET New.autor = UCASE(New.autor);
         END;");


    }

    public function down()
    {
        Schema::dropIfExists('books');
        DB::unprepared('DROP PROCEDURE IF EXISTS AddNewBook');
        DB::unprepared('DROP PROCEDURE IF EXISTS DeleteBook');
        DB::unprepared('DROP PROCEDURE IF EXISTS UpdateBook');
        DB::unprepared('DROP TRIGGER IF EXISTS Update_Book');
        DB::unprepared('DROP TRIGGER IF EXISTS Insert_Book');
    }
}
