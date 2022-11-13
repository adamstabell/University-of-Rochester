clear;

% Set simulation parameter
X_o = 100;
max_t = 50;
max_types = 1000; 

% Set stochastic process parameters
mu = 1.05;
q = 10^-2;
% Initialize empty matrix with all zeros for storing population size
X=zeros(max_types, max_t);
% Initialize empty matrix with all zeros for storing number of types
number_of_types=zeros(1, max_t);
% Initialize population (1 people)
X(1:X_o,1) = 1;
% Initialize first generation
number_of_types(1)=X_o; 
number_of_extinct_types=zeros(1,max_t);

% Start simulation
for n=2:max_t
    disp('n = '+string(n))
    number_of_types(n)=number_of_types(n-1);
    for type = 1:number_of_types(n-1);
        for i = 1:X(type,n-1)
            % Daughter/Not Daughter
            daughters = poissrnd(mu,1,1); 
            % Mutation/No mutation
            mutation = binornd(1,q,1,1);
            
            % If there is a mutation
            if mutation
                number_of_types(n) = number_of_types(n)+1;
                X(number_of_types(n),n) = daughters;
            % Otherwise
            else
                X(type,n) = X(type,n) + daughters;
            end
        end
        
        % Add the extinct type
        if X(type,n)== 0
            number_of_extinct_types(n)=number_of_extinct_types(n)+1;
        end
    end
end

% Problem D
figure()
plot(1:max_t, X)
xlabel('Generation')
ylabel('Number of Women of Each Type')
title('$q=10^{-2},$ $X_{0}=100,$ $n=50$','Interpreter','latex')

figure()
stairs(1:max_t, [number_of_types;number_of_extinct_types]')
xlabel('Generation')
ylabel('Number of Women of Each Type')
title('$q=10^{-2},$ $X_{0}=100,$ $n=50$','Interpreter','latex')
axis([0,50,0,number_of_types(end)])
legend('Number of Types','Number of Extinct Types','Location','Best')

figure()
bar(1:number_of_types(end), X(1:number_of_types(end),max_t),'r')
xlabel('Types')
ylabel('Number of Women of Each Type')
title('Histogram of the Number of Women of Each Type, $n=50$','Interpreter','latex')