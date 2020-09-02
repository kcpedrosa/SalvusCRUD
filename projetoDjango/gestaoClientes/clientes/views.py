from django.shortcuts import render, redirect, get_object_or_404
from django.contrib.auth.decorators import login_required
from .models import Person
from .forms import PersonForm

# Create your views here.

@login_required
def persons_list(request):
    name = request.GET.get('name', None)
    surname = request.GET.get('surname', None )


    if name or surname:
        persons = Person.objects.filter(first_name__icontains=name ) | Person.objects.filter(last_name__icontains=surname )
    else:
        persons = Person.objects.all()

    return render(request, 'list.html', {'persons':persons})

@login_required
def persons_new(request):
    form = PersonForm(request.POST or None, request.FILES or None)
    if form.is_valid():
        form.save()
        return redirect('person_list')

    return render(request, 'person_form.html', {'form': form})

@login_required
def persons_update(request, id):
    person = get_object_or_404(Person,pk=id)
    form = PersonForm(request.POST or None, request.FILES or None, instance=person)

    if form.is_valid():
        form.save()
        return redirect('person_list')

    return render(request, 'person_form.html', {'form': form})

@login_required
def persons_delete(request, id):
    person = get_object_or_404(Person, pk=id)

    form = PersonForm(request.POST or None, request.FILES or None, instance=person)

    if request.method == 'POST':
        person.delete()
        return redirect('person_list')
    #else... return render ...
    return render(request, 'person_delete_confirm.html', {'form':form})