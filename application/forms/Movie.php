<?php

class Application_Form_Movie extends Zend_Form
{
    // ����� init() ��������� �� ���������
    public function init()
    {
        // ����� ��� �����
        $this->setName('movie');

        // ������ ������� hidden c ������ = id
        $id = new Zend_Form_Element_Hidden('id');
        // ���������, ��� ������ � ���� �������� ����������� ��� ����� int
        $id->addFilter('Int');
        
        // ������ ����������, ������� ����� ������� ��������� ���������
        $isEmptyMessage = '�������� �������� ������������ � �� ����� ���� ������';

        // ������ ������� ����� � text c ������ = director        
        $director = new Zend_Form_Element_Text('director');
        
        /*
        * ����� ����� ���������� label, ������� ����� ������������ ��� ������� ����,
        * ���������, �������� ������� ������������ ��� ���,
        * ����� ������ ��������, ������� ����� ����������� � ������� ��������,
        * � �������, ��������� ��������� � ��������� �� ������, ������� ����� �������� ������������
        */
        $director->setLabel('�������')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        
        // ������ ������ ��������� ������� ����� � ����������� �� �� ��������
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('��������')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        
        // ������ ������� ����� Submit c ������ = submit
        $submit = new Zend_Form_Element_Submit('submit');
        // ������ ������� id = submitbutton
        $submit->setAttrib('id', 'submitbutton');

        // ��������� ��� ��������� �������� � �����.
        $this->addElements(array($id, $director, $title, $submit));
    }
}