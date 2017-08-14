{"filter":false,"title":"helpers.c","tooltip":"/pset3/helpers.c","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":44,"column":1},"action":"insert","lines":["#include <cs50.h>","#include \"helpers.h\"","","bool search(int value, int values[], int n)","{","    int beginning = 0;","    int end = n-1;","    ","    while (beginning <= end)","    {","        int middle = (beginning + end) / 2;","        if (values[middle] == value)","        {","            return true;","        }","        else if (values[middle] > value)","        {","            end = middle - 1;","        }","        else","        {","            beginning = middle + 1;","        }","    }","    return false;","}","void sort(int values[], int n)","{","    for (int i = 0; i < n; i++)","    {","        int smallest = i;","        for (int j = i + 1; j < n; j++)","        {","            if (values[j] < values[smallest])","            {","                smallest = j;","            }","        }","        ","        int tmp = values[smallest];","        values[smallest] = values[i];","        ","        values[i] = tmp;","    }","}"],"id":1}]]},"ace":{"folds":[],"scrolltop":294,"scrollleft":0,"selection":{"start":{"row":44,"column":1},"end":{"row":44,"column":1},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1457021266617,"hash":"e3b01f1d7ae7b2593bbeaa834d1e361163568af3"}