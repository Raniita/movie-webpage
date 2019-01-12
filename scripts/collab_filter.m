function collab_filter(id_user)
%%Collaborative Filter for movie recommendation

%Load data
[Y,R,movieList] = getMovieData();

num_users = size(Y,2);
num_movies = size(Y,1);
my_ratings = zeros(num_movies, 1);
num_features = 10;

% Parameters init
X = randn(num_movies,num_features);
Theta = randn(num_users, num_features);
initial_parameters = [X(:); Theta(:)];

%Options fmincg
options = optimset('GradObj', 'on', 'MaxIter', 1000);
lambda = 10;
theta = fmincg (@(t)(cofiCostFunc(t, Y, R, num_users, num_movies, num_features, lambda)), initial_parameters, options);

X = reshape(theta(1:num_movies*num_features), num_movies, num_features);
Theta = reshape(theta(num_movies*num_features+1:end), num_users, num_features);

% Aprendizaje del algoritmo concluido

p = X * Theta';

scores = Y(:,id_user);
recommen = p(:,id_user).*(scores == 0);

%Update DB
updateRecommendation(recommen, id_user);

end

