function [Y,R,movieList] = getData()
    import java.net.*;
    import java.io.*;
    import java.sql.*;

    %Conect to DB
    bbdd='ai18';
    user='jdbc:mysql://labit601.upct.es:3306/ai18';
    pass='ai2019';
    conn=database(bbdd,user,pass);

    Statement stmt = null;
    ResultSet rs = null;

    %Query num movies
    stmt = conn.createStatement();
    num_movies = stmt.executeQuery('SELECT count(id) FROM movie');
    stmt = null;

    %Query num users
    stmt = conn.createStatement();
    num_users = stmt.executeQuery('SELECT count(id) FROM users');
    stmt = null;

    %Creating Matrix
    Y = zeros(num_movies,num_users);
    R = zeros(num_movies,num_users);

    %Pull DB info
    stmt = conn.createStatement();
    users = stmt.executeQuery('SELECT id_user FROM user_score ORDERED BY id_user');
    stmt = null;

    stmt = conn.createStatement();
    movies = stmt.executeQuery('SELECT id_movie FROM user_score ORDERED BY id_user');
    stmt = null;

    stmt = conn.createStatement();
    scores = stmt.executeQuery('SELECT score FROM user_score ORDERED BY id_user');
    stmt = null;

    %Fill matrix
    for row=1:length(users)
        for col=1:length(movies)
            Y(row,col)=scores(rol,col);
            R(row,col)=1;
        end
    end

    %Pull MovieList
    stmt = conn.createStatement();
    movieList = stmt.executeQuery('SELECT id,tittle FROM movie');
    stmt = null;

end
