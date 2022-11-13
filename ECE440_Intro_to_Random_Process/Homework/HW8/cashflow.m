function [X,T]=cashflow(X_0,lambda,alpha,beta,c,d,X_r,X_max,T_max)
    index=1;
    X(index)=X_0;
    T(index)=0;
    while T(index)<T_max
        x=X(index);
        if x==0 
            tau=exprnd(1/lambda);
            T(index+1)=T(index)+tau;
            X(index+1)=x+1;
        elseif 0<x && x<c 
            tau=exprnd(1/(lambda+alpha));
            T(index+1)=T(index)+tau;
            u=rand;
            if u<(lambda/(lambda+alpha))
                X(index+1)=x+1;
            else
                X(index+1)=0;
            end
        elseif c<=x && x<X_r
            tau=exprnd(1/(lambda+alpha));
            T(index+1)=T(index)+tau;
            u=rand;
            if u<(lambda/(lambda+alpha))
                X(index+1)=x+1;
            else
                X(index+1)=x-c;
            end
        elseif X_r<=x && x<X_max
            tau=exprnd(1/(lambda+alpha+beta));
            T(index+1)=T(index)+tau;
            u=rand;
            if u<(lambda/(lambda+alpha+beta))
                X(index+1)=X(index)+1;
            elseif u<((lambda+alpha)/(lambda+alpha+beta))
                                X(index+1)=X(index)-c;
            else
                X(index+1)=X(index)-d;
            end
        elseif x==X_max
            tau=exprnd(1/(alpha+beta));
            T(index+1)=T(index)+tau;
            u=rand;
            if u<(alpha/(lambda+alpha))
                X(index+1)=x-c;
            else
                X(index+1)=x-d;
            end
        else
            disp('Out Of Range')
            break 
        end
        index=index+1;
    end
end