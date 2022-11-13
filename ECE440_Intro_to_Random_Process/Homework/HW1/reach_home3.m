% Clean up workspace. 
close all 
clear     
% Initialize parameters
w_0= 10;   
b = 1;      
p_list = 0.3:0.02:0.7;   
max_t=100;
% Number of experiments for each p
experiments = 500;
% List to capture result from each experiment
home_prob = [];

for p = p_list
    % Number of times reach home
    broke_times = 0;
    % Show progress
    fprintf('p = %.2f, ', p)
    for experiment = 1:experiments
        [w, t, broke] = casino(w_0, b, p, max_t);
        broke_times = broke_times + broke;
    end
    home_prob(end+1) = broke_times/experiments;
    fprintf('reach home prob = %.2f\n', broke_times/experiments)
end

% Show the plot
plot(p_list,home_prob)
% Set axis limit
ylabel ('Probability of Reaching Home'); xlabel('p'); axis([0.3,0.7,0,1])
