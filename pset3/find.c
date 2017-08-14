#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>

#include "helpers.h"

const int MAX = 65536;

int main(int argc, string argv[])
{
    if (argc != 2)
    {
        printf("Usage: ./find needle\n");
        return -1;
    }
    int needle = atoi(argv[1]);

    int size,straw;
    int haystack[MAX];
    for (size = 0; size < MAX; size++)
    {
        printf("\nhaystack[%d] = ", size);
        scanf("%d",&straw);
        if (straw == INT_MAX)
        {
            break;
        }
        haystack[size] = straw;
    }
    printf("\n");

    sort(haystack, size);
    if (search(needle, haystack, size))
    {
        printf("\nFound needle in haystack!\n");
        return 0;
    }
    else
    {
        printf("\nDidn't find needle in haystack.\n");
        return 1;
    }
}