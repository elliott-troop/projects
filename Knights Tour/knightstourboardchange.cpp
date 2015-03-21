//Elliott Porter

/*///////////////////////////////////////////////////////////////////////////////////
README
If you want to change the dimensions of the board, you must do the following:
-change the initialization of the array sizes of "chessboard" to the desired size
-change the value of every instance of the variable "dimensions" to the desired size
////////////////////////////////////////////////////////////////////////////////////*/

#include <iostream>

using namespace std;

void displayBoard();
void checkIfKnightTour();
void knightstour(int,int);
int moveAroundBoard(int,int);
void displayMessage();
void readme();

int moveCounter = 1;

int a,b;
int length = 8;
int xStart,yStart;
int flag = 0;
int attempt = 0;

int chessBoard[8][8]; //Change the dimensions here


int main()
{
    int dimensions = 8; //change if chessboard dimensions are different
    readme();
    cout << "Current Board Size: "<<dimensions<<"x"<<dimensions<<endl;
    cout << "Where do you want the knight to start?\n";
    cout << "X Coordinate: ";
    cin >> xStart;
    while(xStart < 0 || xStart > dimensions-1)
    {
        cout << "The knight can start from:\n(0,0) - (" << (dimensions-1) << "," << (dimensions-1) << ")\nChoose a valid X Coordinate.\n";
        cin >> xStart;
    }
    cout << "Y Coordinate: ";
    cin >> yStart;
    while(yStart < 0 || yStart > dimensions-1)
    {
        cout << "The knight can start from:\n(0,0) - (" << (dimensions-1) << "," << (dimensions-1) << ")\nChoose a valid Y Coordinate.\n";
        cin >> yStart;
    }
    displayMessage();
    knightstour(xStart,yStart);
    checkIfKnightTour();
    displayBoard();

    return 0;
}

void displayMessage()
{
    cout << "This Knight's Tour will begin at [" << xStart << "," << yStart << "]! " << endl<<endl<<endl;
}

void knightstour(int first,int second)
{
    int xPosition = first;
    int yPosition = second;
    int dimensions = 8; //change if chessboard dimensions are different

    if(moveCounter <= (dimensions*dimensions))
    {
        //checks to see if a certain move is possible
        //when advancing on the horizontal and vertical, xPosition and yPosition can't be less than 0 or greater than (dimensons - 1)
        //all possible moves listed

        if(chessBoard[xPosition-2][yPosition-1] == 0) //back twice, up once
        {
            if(!(xPosition-2 < 0 || xPosition-2 > dimensions-1 || yPosition-1 < 0 || yPosition-1 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition-2,yPosition-1);
            }
        }

        if(chessBoard[xPosition-1][yPosition+2] == 0) //back once, up twice
        {
            if(!(xPosition-1 < 0 || xPosition-1 > dimensions-1 || yPosition+2 < 0 || yPosition+2 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition-1,yPosition+2);
            }
        }

        if(chessBoard[xPosition-2][yPosition+1] == 0)//back twice, down once
        {
            if(!(xPosition-2 < 0 || xPosition-2 > dimensions-1||yPosition+1 < 0 || yPosition+1 > dimensions-1)) //checks to see if move is within the board
            {

                moveAroundBoard(xPosition-2,yPosition+1);
            }
        }

        if(chessBoard[xPosition-1][yPosition-2] == 0)//left once, up twice
        {
            if(!(xPosition-1 < 0 || xPosition-1 > dimensions-1 || yPosition-2 < 0 || yPosition-2 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition-1,yPosition-2);
            }
        }
        if(chessBoard[xPosition+2][yPosition-1] == 0)//right twice, up once
        {
            if(!(xPosition+2 < 0 || xPosition+2 > dimensions-1 || yPosition-1 < 0 || yPosition-1 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition+2,yPosition-1);
            }
        }

        if(chessBoard[xPosition+2][yPosition+1] == 0)//right twice, down once
        {
            if(!(xPosition+2 < 0 || xPosition+2 > dimensions-1 || yPosition+1 < 0 || yPosition+1 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition+2,yPosition+1);
            }
        }



        if(chessBoard[xPosition+1][yPosition+2] == 0)//right once, down twice
        {
            if(!(xPosition+1 < 0 || xPosition+1 > dimensions-1 || yPosition+2 < 0 || yPosition+2 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition+1,yPosition+2);
            }
        }

        if(chessBoard[xPosition+1][yPosition-2] == 0)
        {
            if(!(xPosition+1 < 0 || xPosition+1 > dimensions-1 || yPosition-2 < 0 || yPosition-2 > dimensions-1)) //checks to see if move is within the board
            {
                moveAroundBoard(xPosition+1,yPosition-2);
            }
        }
        chessBoard[first][second] = moveCounter++; //the move counter fills the spot of where the knight moved to
        length = dimensions;
        knightstour(a,b);

    }
}

int moveAroundBoard(int first,int second)
{
     int xPosition = first;
     int yPosition = second;
     int dimensions = 8; //change if chessboard dimensions are different
     int count=0;


     if((xPosition>=0&&yPosition>=0)&&(xPosition<=dimensions-1&&yPosition<=dimensions-1))
     {
         if((xPosition-1>=0&&yPosition-2<=dimensions-1)&&(chessBoard[xPosition-1][yPosition-2]==0))
        {
            count++;
        }
        if((xPosition+2>=0&&yPosition-1<=dimensions-1&&xPosition+2<=dimensions-1)&&(chessBoard[xPosition+2][yPosition-1]==0))
        {
            count++;
        }
        if((xPosition-2>=0&&yPosition+1<=dimensions-1)&&(chessBoard[xPosition-2][yPosition+1]==0))
        {
            count++;
        }
        if((xPosition-2>=0&&yPosition-1<=dimensions-1)&&(chessBoard[xPosition-2][yPosition-1]==0))
        {
            count++;
        }

        if((xPosition+2>=0&&yPosition+1<=dimensions-1&&xPosition+1<=dimensions-1)&&(chessBoard[xPosition+2][yPosition+1]==0))
        {
            count++;
        }
        if((xPosition-1>=0&&yPosition+2<=dimensions-1)&&(chessBoard[xPosition-1][yPosition+2]==0))
        {
            count++;
        }
        if((xPosition+1>=0&&yPosition+2<=dimensions-1&&xPosition+1<=dimensions-1)&&(chessBoard[xPosition+1][yPosition+2]==0))
        {
            count++;
        }
        if((xPosition+1>=0&&yPosition-2<=dimensions-1&&xPosition+1<=dimensions-1)&&(chessBoard[xPosition+1][yPosition-2]==0))
        {
            count++;
        }
     }

     if(count<length)
     {
       length=count;
       a=first;
       b=second;
     }
     displayBoard();
}


void checkIfKnightTour()
{
    int dimensions = 8; //change if chessboard dimensions are different
    for(int a = 0; a < dimensions; a++)
    {
        for(int b = 0; b < dimensions; b++)
        {
            if(chessBoard[a][b] == 0)
            {
                flag +=1;
            }
        }
    }
    if(!(flag == 0))
        {
            cout << "\nKnight's Tour Not Found!\n";
            cout << "The Knight started at [" << xStart << "," << yStart << "]";
        }
    else
        {
            cout << "\nKnight's Tour Found!\n";
            cout << "The Knight started at [" << xStart << "," << yStart << "]";
        }
}

void displayBoard()
{
    int dimensions = 8;//change if chessboard dimensions are different
    cout << "\n\n";
    for(int a = 0; a < dimensions; a++)
    {
        for(int b = 0; b < dimensions; b++)
        {
            if(chessBoard[a][b] < 10)
            {
                cout << "0"<< chessBoard[a][b] << " ";
            }
            else
                cout << chessBoard[a][b] << " ";
        }
        cout << endl;
    }
    attempt++;
    cout << "Iteration:" << attempt<< endl;
}

void readme()
{
    cout << "////////////////////////////////////////////////////////////////////////////////"<<endl;
    cout << "README\n";
    cout << "If you want to change the dimensions of the board, you must do the following \nwithin the code:\n\n";
    cout << "\t-change the initialization of the array sizes of ""chessboard"" to the \n\tdesired size\n\n";
    cout << "\t-change the value of every instance of the variable ""dimensions"" to the \n\tdesired size\n\n";
    cout << "////////////////////////////////////////////////////////////////////////////////\n";
}
