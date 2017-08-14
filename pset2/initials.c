#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>

int main ()
{ 
  int i;  
  string input = GetString();
  if(isupper(input[0]))
  {
  printf("%c",toupper(input[0]));
  }
  else if (islower(input[0]))
  {
      printf("%c",toupper(input[0]));
  }
  
  for(i=0;i<strlen(input);i++)
   {
       if ( input[i] == ' ' && input[i + 1] != '\0') 
        {
            printf("%c",toupper(input[i + 1])); 
            i++;
        }
   }
   printf("\n");
}