<?php
/**
 * ���������� ���������
 */

include('palindrom.php');

//GO
$Palindrom = new Palindrom();
echo $Palindrom->doFind('��������� ����� �����');           // �������������������
echo $Palindrom->doFind('� ���� ����� �� ���� �����');      // ���������������������
echo $Palindrom->doFind('������� ��� ����� ����� ������������ ���� ��������');   // �������
echo $Palindrom->doFind('���������');   // �