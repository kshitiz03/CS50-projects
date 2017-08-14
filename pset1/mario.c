#include<stdio.h>
#include<cs50.h>
int main(void)
{
int n,i,j,l;
do
   {
  	 printf("enter the height\n");
     n=GetInt();
     if (n<0||n>=24)
       {
       	 printf("retry\n");
	   }
	}
	while(n<0||n>=24);
	for(i=1; i<=n; i++)
	  {
	  	 for(j=0; j<n-i; j++)
	       {
	       	  printf(" ");
	       }
	     for(l=j; l<=n; l++)
           {
           	  printf("#");
	       }
	     printf("\n");
	   }
}