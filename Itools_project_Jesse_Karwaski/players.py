import names
import random



def create(teamID, StartPlayerID):

    position = [
        'Qb',
        'OL',
        'OL',
        'OL',
        'OL',
        'OL',
        'Wr',
        'Wr',
        'Rb',
        'TE',
        'DL',
        'DL',
        'DL',
        'DL',
        'LB',
        'LB',
        'LB',
        'LB',
        'DB',
        'DB',
        'DB',
        'DB',
        'DB',
    ]
    i = StartPlayerID
    for val in position:
        print(
            "({},{},'{}','{}','{}',{},{}),".format(i,teamID,names.get_first_name(gender='male'), names.get_last_name(), val ,random.randint(165,200),random.randint(180,280))
        )
        i = i + 1


create(1, 1)
create(2, 24)
create(3, 47)
create(4, 70)
create(5, 93)
create(6,116)
create(7, 139)
create(8, 162)
create(9, 185)
create(10, 208)