% Load CSCO data and set parameters
cisco_stock_price
Z = log(close_price);
Y = Z(2:end)-Z(1:end-1);
N = length(Y);
h = 1/365;
x = -0.1:0.01:0.1;
n_elements = histc(Y,x);
mu_hat = 0.6275;
sigma_sqr_hat = 0.2174;

% Compare pdf
figure(1)
bar(x,n_elements/N/0.01)
hold on
x_padded = -0.1:0.001:0.1;
plot(x_padded,normpdf(x_padded,mu_hat*h,sqrt(sigma_sqr_hat*h)), 'Linewidth', 3)
title('Compare PDF');
grid on
axis([-0.1,0.1,0,25])

% Compare cdf
figure(2)
c_elements = cumsum(n_elements)/N;
bar(x,c_elements)
hold on
x_padded = -0.1:0.001:0.1;
plot(x_padded,normcdf(x_padded,mu_hat*h,sqrt(sigma_sqr_hat*h)), 'Linewidth', 3)
title('Compare CDF');
grid on
axis([-0.1,0.1,0,1])