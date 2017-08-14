#include <stdio.h>
#include <cs50.h>
#include <math.h>



int main(void) 
{
    float n;
    int c,quat,dim,j,get,r;
    do 
    {
        printf("owned money ");
        n = GetFloat();
        if(n==0||n<= 0)
        {
        printf("retry\n");
        }
    }
    while(n<=0);
    c = (int)round(n*100);
    quat = c/25;
    r = c%25;
    dim = r/10;
    r = r%10;
    j = r / 5;
    r = r % 5;
    get = quat + dim + j + r;
    printf("%d\n", get);
    return 0;
}
