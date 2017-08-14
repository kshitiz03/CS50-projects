#include <cs50.h>
#include "helpers.h"

bool search(int value, int values[], int n)
{
    int beginning = 0;
    int end = n-1;
    
    while (beginning <= end)
    {
        int middle = (beginning + end) / 2;
        if (values[middle] == value)
        {
            return true;
        }
        else if (values[middle] > value)
        {
            end = middle - 1;
        }
        else
        {
            beginning = middle + 1;
        }
    }
    return false;
}
void sort(int values[], int n)
{
    for (int i = 0; i < n; i++)
    {
        int smallest = i;
        for (int j = i + 1; j < n; j++)
        {
            if (values[j] < values[smallest])
            {
                smallest = j;
            }
        }
        
        int tmp = values[smallest];
        values[smallest] = values[i];
        
        values[i] = tmp;
    }
}