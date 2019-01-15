function updateRecommendation(recommen, id_user)

    %Java imports
    import java.net.*;
    import java.io.*;
    import java.sql.*;

    %Conect to DB
    bbdd='ai18';
    user='jdbc:mysql://labit601.upct.es:3306/ai18';
    pass='ai2019';
    conn=database(bbdd,user,pass);

    [score, id_movie] = sort(recommen, 'descend');
    recommendation = score(1:10);
    recommendation_id = id_movie(1:10);

    string_id_movie = int2str(id_movie);
    stmt = conn.createStatement();
    num = stmt.executeQuery("SELECT count(user_id) FROM recs WHERE user_id=', string_id_movie");

    if(stmt.Data ~=0)
        stmt1 = conn.createStatement();
        num1 = stmt1.executeQuery("DELETE FROM recs WHERE user_id=', string_id");

        for j=1:length(recommendation)
            time = datestr(now);
            stmt2 = conn.createStatement();
            num = stmt2.executeQuery("INSERT INTO recs (user_id, movie_id, rec_score, time) VALUES ("+id_user+","+recommendation_id(1,j)+","+recommendation(1,j)+","+time+")");
        end

end