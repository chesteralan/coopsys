import { CivilStatus, Gender } from '@/typing/member';
import { create } from 'zustand'

type MemberStore = {
  firstName: string;
  lastName: string;
  middleName: string;
  dateOfBirth: string;
  placeOfBirth: string;
  religion: string;
  gender: Gender;
  civilStatus: CivilStatus;
  actions: {
    setFirstName: (firstName: string) => void;
    setLastName: (lastName: string) => void;
    setMiddleName: (middleName: string) => void;
    setDateOfBirth: (dateOfBirth: string) => void;
    setPlaceOfBirth: (placeOfBirth: string) => void;
    setReligion: (religion: string) => void;
    setGender: (gender: Gender) => void;
    setCivilStatus: (civilStatus: CivilStatus) => void;
  }
}

const useMemberStore = create<MemberStore>()((set) => ({
  firstName: '',
  lastName: '',
  middleName: '',
  dateOfBirth: '',
  placeOfBirth: '',
  religion: '',
  gender: 'male',
  civilStatus: 'single',
  actions: {
    setFirstName: (firstName: string) => set({ firstName }),
    setLastName: (lastName: string) => set({ lastName }),
    setMiddleName: (middleName: string) => set({ middleName }),
    setDateOfBirth: (dateOfBirth: string) => set({ dateOfBirth }),
    setPlaceOfBirth: (placeOfBirth: string) => set({ placeOfBirth }),
    setReligion: (religion: string) => set({ religion }),
    setGender: (gender: Gender) => set({ gender }),
    setCivilStatus: (civilStatus: CivilStatus) => set({ civilStatus }),
  }
}))

export const useMemberActions = () => useMemberStore((state) => state.actions)
export const useMemberFirstName = () => useMemberStore((state) => state.firstName)
export const useMemberLastName = () => useMemberStore((state) => state.lastName)
export const useMemberMiddleName = () => useMemberStore((state) => state.middleName)
export const useMemberDateOfBirth = () => useMemberStore((state) => state.dateOfBirth)
export const useMemberPlaceOfBirth = () => useMemberStore((state) => state.placeOfBirth)
export const useMemberReligion = () => useMemberStore((state) => state.religion)
export const useMemberGender = () => useMemberStore((state) => state.gender)
export const useMemberCivilStatus = () => useMemberStore((state) => state.civilStatus)