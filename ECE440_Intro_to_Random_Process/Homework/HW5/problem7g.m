clear all;

J=16;
p=1/J;
N=10^5;
lambda=0.9*p*(1-p)^(J-1);

x = aloha_uplink_simulation(J,p,lambda,N);

figure
stairs(1:1000,x(1:4,1:1000)');
title('Evolution of queues 1..4 over the first 1000 time slots')
xlabel('time')
ylabel('packets in queues 1..4')
legend('queue 1','queue 2','queue 3','queue 4','Location','Best')